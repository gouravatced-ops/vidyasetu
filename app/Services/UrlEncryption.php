<?php

namespace App\Services;

use Illuminate\Contracts\Encryption\DecryptException;
use RuntimeException;

class UrlEncryption
{
    private const CIPHER = 'aes-256-gcm';
    private const IV_LENGTH = 12;
    private const TAG_LENGTH = 16;

    public static function encryptId(int|string $value): string
    {
        $payload = (string) $value;
        $iv = random_bytes(self::IV_LENGTH);
        $key = self::encryptionKey();

        $ciphertext = openssl_encrypt($payload, self::CIPHER, $key, OPENSSL_RAW_DATA, $iv, $tag, '', self::TAG_LENGTH);

        if ($ciphertext === false || $tag === false) {
            throw new RuntimeException('Unable to encrypt URL value.');
        }

        return self::base64UrlEncode($iv . $tag . $ciphertext);
    }

    public static function decryptId(string $value): int
    {
        $decoded = self::base64UrlDecode($value);
        if ($decoded === false || strlen($decoded) < self::IV_LENGTH + self::TAG_LENGTH) {
            throw new DecryptException('The encrypted URL value is invalid.');
        }

        $iv = substr($decoded, 0, self::IV_LENGTH);
        $tag = substr($decoded, self::IV_LENGTH, self::TAG_LENGTH);
        $ciphertext = substr($decoded, self::IV_LENGTH + self::TAG_LENGTH);
        $key = self::encryptionKey();

        $result = openssl_decrypt($ciphertext, self::CIPHER, $key, OPENSSL_RAW_DATA, $iv, $tag);

        if ($result === false || !ctype_digit($result)) {
            throw new DecryptException('The encrypted URL value could not be decrypted.');
        }

        return (int) $result;
    }

    private static function encryptionKey(): string
    {
        $secret = config('url_encryption.secret');
        if (empty($secret)) {
            throw new RuntimeException('URL encryption secret is not configured.');
        }

        if (str_starts_with($secret, 'base64:')) {
            $decoded = base64_decode(substr($secret, 7), true);
            if ($decoded === false) {
                throw new RuntimeException('The URL encryption secret is not a valid base64 string.');
            }
            $secret = $decoded;
        }

        return hash('sha256', $secret, true);
    }

    private static function base64UrlEncode(string $value): string
    {
        return rtrim(strtr(base64_encode($value), '+/', '-_'), '=');
    }

    private static function base64UrlDecode(string $value): string|false
    {
        $padding = 4 - (strlen($value) % 4);
        if ($padding < 4) {
            $value .= str_repeat('=', $padding);
        }

        return base64_decode(strtr($value, '-_', '+/'));
    }
}
