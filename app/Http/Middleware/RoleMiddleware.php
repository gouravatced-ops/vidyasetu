<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @param  string  $role
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, string $role)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $user = Auth::user();

        if (!$this->userHasRequiredRole($user, $role)) {
            // Redirect to appropriate dashboard based on user's actual role
            if ($user->role) {
                switch ($user->role->name) {
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
                }
            }

            // If no role or invalid role, logout
            Auth::logout();
            return redirect()->route('login')->withErrors(['error' => 'Access denied. Invalid user role.']);
        }

        return $next($request);
    }

    /**
     * Check if the authenticated user has the required role.
     */
    private function userHasRequiredRole(User $user, string $requiredRole): bool
    {
        if (!$user->role) {
            return false;
        }

        if ($requiredRole === 'admin') {
            return in_array($user->role->name, ['admin', 'super_admin', 'school_admin'], true);
        }

        return $user->role->name === $requiredRole;
    }
}