<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Carbon\Carbon;

class UserVerification extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'type',
        'token',
        'code',
        'expires_at',
        'is_used',
        'used_at',
    ];

    protected $casts = [
        'expires_at' => 'datetime',
        'used_at' => 'datetime',
        'is_used' => 'boolean',
    ];

    /**
     * Get the user that owns the verification.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Check if the verification token/code is expired
     */
    public function isExpired(): bool
    {
        return $this->expires_at->isPast();
    }

    /**
     * Check if the verification token/code is valid
     */
    public function isValid(): bool
    {
        return !$this->is_used && !$this->isExpired();
    }

    /**
     * Mark the verification as used
     */
    public function markAsUsed(): void
    {
        $this->update([
            'is_used' => true,
            'used_at' => now(),
        ]);
    }

    /**
     * Scope for unused verifications
     */
    public function scopeUnused($query)
    {
        return $query->where('is_used', false);
    }

    /**
     * Scope for unexpired verifications
     */
    public function scopeUnexpired($query)
    {
        return $query->where('expires_at', '>', now());
    }

    /**
     * Scope for valid verifications
     */
    public function scopeValid($query)
    {
        return $query->unused()->unexpired();
    }

    /**
     * Scope for specific type
     */
    public function scopeOfType($query, string $type)
    {
        return $query->where('type', $type);
    }
}