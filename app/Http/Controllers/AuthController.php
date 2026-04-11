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
            $this->logFailedLogin($request, 'User not found');
            return back()->withErrors(['email' => $request->login_type === 'password' ? 'Invalid credentials' : 'Invalid phone number'])->withInput();
        }

        // Check if user is active
        if (!$user->is_active) {
            $this->logFailedLogin($request, 'Account deactivated');
            return back()->withErrors(['email' => 'Account is deactivated'])->withInput();
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
        if (Auth::attempt($credentials, $request->has('remember'))) {
            $request->session()->regenerate();

            // Update last login
            $user->update(['last_login_at' => now()]);

            // Log successful login
            $this->logSuccessfulLogin($request, $user);

            return $this->redirectToRoleBasedDashboard($user);
        }

        // Log failed login
        $this->logFailedLogin($request, 'Invalid password');

        return back()->withErrors(['password' => 'Invalid credentials'])->withInput();
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
        $user = User::where('email', $request->email)->first();

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