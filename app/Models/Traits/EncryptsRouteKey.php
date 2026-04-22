<?php

namespace App\Models\Traits;

use App\Services\UrlEncryption;
use Illuminate\Contracts\Encryption\DecryptException;

trait EncryptsRouteKey
{
    public function getRouteKey(): string
    {
        return UrlEncryption::encryptId($this->getKey());
    }

    public function resolveRouteBinding($value, $field = null)
    {
        if ($field === null || $field === $this->getRouteKeyName()) {
            try {
                $id = UrlEncryption::decryptId($value);
            } catch (\Throwable $exception) {
                return null;
            }

            return $this->whereKey($id)->firstOrFail();
        }

        return $this->where($field, $value)->firstOrFail();
    }
}
