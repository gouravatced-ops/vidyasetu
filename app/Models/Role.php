<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Role extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'display_name',
        'description',
        'permissions',
        'is_active',
        'priority',
    ];

    protected $casts = [
        'permissions' => 'array',
        'is_active' => 'boolean',
        'priority' => 'integer',
    ];

    /**
     * Get the users for the role.
     */
    public function users(): HasMany
    {
        return $this->hasMany(User::class);
    }

    /**
     * Check if role has a specific permission
     */
    public function hasPermission(string $permission): bool
    {
        if (!$this->permissions) {
            return false;
        }

        return in_array($permission, $this->permissions);
    }

    /**
     * Check if role has any of the given permissions
     */
    public function hasAnyPermission(array $permissions): bool
    {
        if (!$this->permissions) {
            return false;
        }

        return !empty(array_intersect($permissions, $this->permissions));
    }

    /**
     * Scope for active roles
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * Scope for ordering by priority
     */
    public function scopeOrdered($query)
    {
        return $query->orderBy('priority', 'desc');
    }
}