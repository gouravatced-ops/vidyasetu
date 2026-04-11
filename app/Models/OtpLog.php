<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Carbon\Carbon;

class OtpLog extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'type',
        'recipient',
        'otp_code',
        'purpose',
        'is_used',
        'used_at',
        'expires_at',
        'attempts',
        'successful',
        'failure_reason',
        'metadata',
    ];

    protected $casts = [
        'is_used' => 'boolean',
        'successful' => 'boolean',
        'used_at' => 'datetime',
        'expires_at' => 'datetime',
        'attempts' => 'integer',
        'metadata' => 'array',
    ];

    /**
     * Get the user that owns the OTP log.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Check if the OTP is expired
     */
    public function isExpired(): bool
    {
        return $this->expires_at->isPast();
    }

    /**
     * Check if the OTP is valid
     */
    public function isValid(): bool
    {
        return !$this->is_used && !$this->isExpired() && $this->attempts < 3;
    }

    /**
     * Mark the OTP as used
     */
    public function markAsUsed(): void
    {
        $this->update([
            'is_used' => true,
            'used_at' => now(),
            'successful' => true,
        ]);
    }

    /**
     * Increment attempts
     */
    public function incrementAttempts(): void
    {
        $this->increment('attempts');
    }

    /**
     * Mark as failed
     */
    public function markAsFailed(string $reason = null): void
    {
        $this->update([
            'successful' => false,
            'failure_reason' => $reason,
        ]);
    }

    /**
     * Scope for unused OTPs
     */
    public function scopeUnused($query)
    {
        return $query->where('is_used', false);
    }

    /**
     * Scope for unexpired OTPs
     */
    public function scopeUnexpired($query)
    {
        return $query->where('expires_at', '>', now());
    }

    /**
     * Scope for valid OTPs
     */
    public function scopeValid($query)
    {
        return $query->unused()->unexpired()->where('attempts', '<', 3);
    }

    /**
     * Scope for specific type
     */
    public function scopeOfType($query, string $type)
    {
        return $query->where('type', $type);
    }

    /**
     * Scope for specific purpose
     */
    public function scopeForPurpose($query, string $purpose)
    {
        return $query->where('purpose', $purpose);
    }

    /**
     * Scope for specific recipient
     */
    public function scopeForRecipient($query, string $recipient)
    {
        return $query->where('recipient', $recipient);
    }
}