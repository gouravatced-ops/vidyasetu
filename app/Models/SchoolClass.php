<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Traits\EncryptsRouteKey;
use App\Services\UrlEncryption;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class SchoolClass extends Model
{
    use HasFactory, EncryptsRouteKey;

    protected $fillable = [
        'school_id',
        'number',
        'display_number',
        'name',
        'description',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function school(): BelongsTo
    {
        return $this->belongsTo(School::class);
    }

    public function sections(): HasMany
    {
        return $this->hasMany(Section::class)->where('is_active', true);
    }

    public function students(): HasMany
    {
        return $this->hasMany(User::class, 'school_class_id');
    }

    public function resolveChildRouteBinding($childType, $value, $field = null)
    {
        if ($childType === Section::class) {
            return $this->sections()->whereKey(UrlEncryption::decryptId($value))->firstOrFail();
        }

        return parent::resolveChildRouteBinding($childType, $value, $field);
    }

    public static function toRoman(string $number): string
    {
        $number = trim($number);
        if ($number === '' || strcasecmp($number, 'nursery') === 0 || $number === '0') {
            return 'NUR';
        }

        if (ctype_digit($number)) {
            $value = (int) $number;
            if ($value === 0) {
                return 'NUR';
            }

            $map = [
                1000 => 'M',
                900 => 'CM',
                500 => 'D',
                400 => 'CD',
                100 => 'C',
                90 => 'XC',
                50 => 'L',
                40 => 'XL',
                10 => 'X',
                9 => 'IX',
                5 => 'V',
                4 => 'IV',
                1 => 'I',
            ];

            $result = '';
            foreach ($map as $value => $symbol) {
                while ($number >= $value) {
                    $result .= $symbol;
                    $number -= $value;
                }
            }

            return $result;
        }

        return strtoupper($number);
    }
}
