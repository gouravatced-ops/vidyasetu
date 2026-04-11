<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Carbon\Carbon;

class LoginLog extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'ip_address',
        'user_agent',
        'device_type',
        'browser',
        'operating_system',
        'location',
        'successful',
        'failure_reason',
        'login_at',
        'logout_at',
    ];

    protected $casts = [
        'successful' => 'boolean',
        'login_at' => 'datetime',
        'logout_at' => 'datetime',
    ];

    /**
     * Get the user that owns the login log.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Scope for successful logins
     */
    public function scopeSuccessful($query)
    {
        return $query->where('successful', true);
    }

    /**
     * Scope for failed logins
     */
    public function scopeFailed($query)
    {
        return $query->where('successful', false);
    }

    /**
     * Scope for recent logins
     */
    public function scopeRecent($query, int $days = 30)
    {
        return $query->where('login_at', '>=', now()->subDays($days));
    }

    /**
     * Scope for specific IP address
     */
    public function scopeFromIp($query, string $ip)
    {
        return $query->where('ip_address', $ip);
    }

    /**
     * Get login duration in minutes
     */
    public function getDurationAttribute(): ?int
    {
        if (!$this->logout_at) {
            return null;
        }

        return $this->login_at->diffInMinutes($this->logout_at);
    }

    /**
     * Check if user is currently logged in
     */
    public function isActive(): bool
    {
        return $this->logout_at === null;
    }
}