<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
use App\Models\User;
use App\Models\LoginLog;
use App\Models\OtpLog;
use Carbon\Carbon;

class AuthController extends Controller
{
    /**
     * Show the login form
     */
    public function showLoginForm()
    {
        return view('auth.login');
    }

    /**
     * Show the forgot password form
     */
    public function showForgetPasswordForm()
    {
        return view('auth.forgetpassword');
    }

    /**
     * Handle forgot password request and reset submission
     */
    public function handleForgetPassword(Request $request)
    {
        if ($request->filled('otp')) {
            $validator = Validator::make($request->all(), [
                'identifier' => 'required|string',
                'otp' => 'required|digits:6',
                'password' => 'required|string|min:6|confirmed',
            ]);

            if ($validator->fails()) {
                return back()->withErrors($validator)->withInput();
            }

            $user = User::where('email', $request->identifier)
                ->orWhere('name', $request->identifier)
                ->first();

            if (!$user) {
                return back()->withErrors(['identifier' => 'No account found with that email or username.'])->withInput();
            }

            if (!$user->is_active) {
                return back()->withErrors(['identifier' => 'Account is inactive. Please contact school administration.'])->withInput();
            }

            $otpLog = OtpLog::where('user_id', $user->id)
                ->where('recipient', $user->email)
                ->where('purpose', 'password_reset')
                ->where('otp_code', $request->otp)
                ->where('is_used', false)
                ->where('expires_at', '>', now())
                ->latest()
                ->first();

            if (!$otpLog) {
                return back()->withErrors(['otp' => 'Invalid or expired OTP.'])->withInput();
            }

            $otpLog->markAsUsed();

            $user->password = Hash::make($request->password);
            $user->password_changed_at = now();
            $user->save();

            return redirect()->route('login')->with('status', 'Password reset successfully. You can now sign in with your new password.');
        }

        $validator = Validator::make($request->all(), [
            'identifier' => 'required|string',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $user = User::where('email', $request->identifier)
            ->orWhere('name', $request->identifier)
            ->first();

        if (!$user) {
            return back()->withErrors(['identifier' => 'No account found with that email or username.'])->withInput();
        }

        if (!$user->is_active) {
            return back()->withErrors(['identifier' => 'Account is inactive. Please contact school administration.'])->withInput();
        }

        $otp = str_pad(rand(0, 999999), 6, '0', STR_PAD_LEFT);

        OtpLog::create([
            'user_id' => $user->id,
            'type' => 'email',
            'recipient' => $user->email,
            'otp_code' => $otp,
            'purpose' => 'password_reset',
            'expires_at' => now()->addMinutes(10),
            'is_used' => false,
            'attempts' => 0,
            'successful' => false,
        ]);

        Log::info("Password reset OTP for {$user->email}: {$otp}");

        return back()->with('status', 'OTP sent to your registered email. Enter it below to reset your password.')
            ->withInput(['identifier' => $request->identifier])
            ->with('showResetFields', true);
    }

    /**
     * Handle login attempt
     */
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'login_type' => 'required|in:password,otp',
            'email' => 'required_if:login_type,password|email',
            'password' => 'required_if:login_type,password|string|min:6',
            'phone' => 'required_if:login_type,otp|digits:10',
            'otp' => 'required_if:login_type,otp|digits:6',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        if ($request->login_type === 'otp') {
            $user = User::where('phone', $request->phone)->first();
        } else {
            $user = User::where('email', $request->email)->first();
        }

        // Check if user exists
        if (!$user) {
            $field = $request->login_type === 'password' ? 'email' : 'phone';
            $message = $request->login_type === 'password' ? 'Wrong email or password' : 'Invalid phone number';
            $this->logFailedLogin($request, 'User not found');
            return back()->withErrors([$field => $message])->withInput();
        }

        // Check if user is active
        if (!$user->is_active) {
            $field = $request->login_type === 'password' ? 'email' : 'phone';
            $this->logFailedLogin($request, 'Account is deactivated');
            return back()->withErrors([$field => 'Account is inactive. Please contact school administration for login access.'])->withInput();
        }

        // Handle OTP login
        if ($request->login_type === 'otp') {
            return $this->handleOtpLogin($request, $user);
        }

        // Handle password login
        $credentials = $request->only('email', 'password');
        return $this->handlePasswordLogin($request, $user, $credentials);
    }

    /**
     * Handle password-based login
     */
    private function handlePasswordLogin(Request $request, User $user, array $credentials)
    {
        if (!Hash::check($credentials['password'], $user->password)) {
            $this->logFailedLogin($request, 'Invalid password');
            return back()->withErrors(['password' => 'Invalid credentials'])->withInput();
        }

        if ($this->passwordHasExpired($user)) {
            return redirect()->route('password.request')
                ->with('status', 'Please reset your password due to security reasons.')
                ->withInput(['identifier' => $request->email]);
        }

        Auth::login($user, $request->has('remember'));
        $request->session()->regenerate();

        // Update last login
        $user->update(['last_login_at' => now()]);

        // Log successful login
        $this->logSuccessfulLogin($request, $user);

        return $this->redirectToRoleBasedDashboard($user);
    }

    /**
     * Check whether a password has expired after 30 days
     */
    private function passwordHasExpired(User $user): bool
    {
        if (!$user->password_changed_at) {
            return false;
        }

        return $user->password_changed_at->lt(now()->subDays(30));
    }

    /**
     * Handle OTP-based login
     */
    private function handleOtpLogin(Request $request, User $user)
    {
        $otp = $request->otp;

        // Verify OTP (in production, this would check against sent OTP)
        $otpLog = OtpLog::where('user_id', $user->id)
            ->where('recipient', $user->phone)
            ->where('otp_code', $otp)
            ->where('purpose', 'login')
            ->where('is_used', false)
            ->where('expires_at', '>', now())
            ->latest()
            ->first();

        if (!$otpLog) {
            $this->logFailedLogin($request, 'Invalid or expired OTP');
            return back()->withErrors(['otp' => 'Invalid or expired OTP'])->withInput();
        }

        // Mark OTP as used
        $otpLog->markAsUsed();

        // Log in the user
        Auth::login($user, $request->has('remember'));
        $request->session()->regenerate();

        // Update last login
        $user->update(['last_login_at' => now()]);

        // Log successful login
        $this->logSuccessfulLogin($request, $user);

        return $this->redirectToRoleBasedDashboard($user);
    }

    /**
     * Send OTP (store only - no actual sending)
     */
    public function sendOtp(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'phone' => 'required|digits:10|exists:users,phone'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Invalid mobile number'
            ], 422);
        }

        $user = User::where('phone', $request->phone)->first();

        // Generate OTP
        $otp = str_pad(rand(0, 999999), 6, '0', STR_PAD_LEFT);

        // Store OTP log (in production, this would be sent via SMS/Email)
        OtpLog::create([
            'user_id' => $user->id,
            'type' => 'sms',
            'recipient' => $request->phone,
            'otp_code' => $otp,
            'purpose' => 'login',
            'expires_at' => now()->addMinutes(10),
            'is_used' => false,
        ]);

        // Log OTP generation
        Log::info("OTP generated for user {$user->email} ({$user->phone}): {$otp}");

        return response()->json([
            'success' => true,
            'message' => 'OTP sent successfully (check logs for demo)',
            'otp' => $otp // Remove this in production - only for demo
        ]);
    }

    /**
     * Redirect to role-based dashboard
     */
    private function redirectToRoleBasedDashboard(User $user)
    {
        $role = $user->role;

        if (!$role) {
            Auth::logout();
            return redirect('/login')->withErrors(['error' => 'No role assigned to user']);
        }

        switch ($role->name) {
            case 'admin':
            case 'super_admin':
            case 'school_admin':
                return redirect()->route('admin.dashboard');
            case 'parent':
                return redirect()->route('parent.dashboard');
            case 'teacher':
                return redirect()->route('teacher.dashboard');
            case 'student':
                return redirect()->route('student.dashboard');
            default:
                Auth::logout();
                return redirect('/login')->withErrors(['error' => 'Invalid user role']);
        }
    }

    /**
     * Log successful login
     */
    private function logSuccessfulLogin(Request $request, User $user)
    {
        LoginLog::create([
            'user_id' => $user->id,
            'ip_address' => $request->ip(),
            'user_agent' => $request->userAgent(),
            'login_at' => now(),
            'status' => 'success',
            'login_method' => $request->login_type ?? 'password'
        ]);
    }

    /**
     * Log failed login
     */
    private function logFailedLogin(Request $request, string $reason)
    {
        $user = null;

        if ($request->filled('email')) {
            $user = User::where('email', $request->email)->first();
        } elseif ($request->filled('phone')) {
            $user = User::where('phone', $request->phone)->first();
        }

        LoginLog::create([
            'user_id' => $user ? $user->id : null,
            'ip_address' => $request->ip(),
            'user_agent' => $request->userAgent(),
            'login_at' => now(),
            'status' => 'failed',
            'failure_reason' => $reason,
            'login_method' => $request->login_type ?? 'password'
        ]);
    }

    /**
     * Logout user
     */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }

    /**
     * Get current authenticated user info
     */
    public function user(Request $request)
    {
        return response()->json([
            'user' => $request->user(),
            'role' => $request->user()->role
        ]);
    }
}