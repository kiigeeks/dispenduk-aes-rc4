<?php

namespace App\Services;

use Illuminate\Support\Facades\Crypt;

class EncryptionService
{
    public static function encryptAES($data)
    {
        $startTime = microtime(true); // Mulai hitung waktu
        $encryptedData = Crypt::encryptString($data);
        $endTime = microtime(true); // Akhir hitung waktu

        $timeTaken = $endTime - $startTime; // Selisih waktu

        return [
            'encryptedData' => $encryptedData,
            'timeTaken' => $timeTaken,
        ];
    }

    public static function decryptAES($encryptedData)
    {
        $startTime = microtime(true);
        $decryptedData = Crypt::decryptString($encryptedData);
        $endTime = microtime(true);

        $timeTaken = $endTime - $startTime;

        return [
            'decryptedData' => $decryptedData,
            'timeTaken' => $timeTaken,
        ];
    }

    public static function encryptRC4($data, $key)
    {
        $startTime = microtime(true);

        $s = [];
        $j = 0;
        $keyLength = strlen($key);

        // Key-scheduling algorithm (KSA)
        for ($i = 0; $i < 256; $i++) {
            $s[$i] = $i;
        }

        for ($i = 0; $i < 256; $i++) {
            $j = ($j + $s[$i] + ord($key[$i % $keyLength])) % 256;
            [$s[$i], $s[$j]] = [$s[$j], $s[$i]]; // Swap
        }

        // Pseudo-random generation algorithm (PRGA)
        $i = $j = 0;
        $result = '';

        for ($y = 0, $dataLength = strlen($data); $y < $dataLength; $y++) {
            $i = ($i + 1) % 256;
            $j = ($j + $s[$i]) % 256;
            [$s[$i], $s[$j]] = [$s[$j], $s[$i]]; // Swap
            $k = $s[($s[$i] + $s[$j]) % 256];
            $result .= chr(ord($data[$y]) ^ $k);
        }

        $endTime = microtime(true);
        $timeTaken = $endTime - $startTime;
        
        return [
            'encryptedData' => base64_encode($result),
            'timeTaken' => $timeTaken,
        ];
    }

    public static function decryptRC4($encryptedData, $key)
    {
        $startTime = microtime(true);

        $s = [];
        $j = 0;
        $keyLength = strlen($key);
        $data = base64_decode($encryptedData); // Decode base64 encoded data

        // Key-scheduling algorithm (KSA)
        for ($i = 0; $i < 256; $i++) {
            $s[$i] = $i;
        }

        for ($i = 0; $i < 256; $i++) {
            $j = ($j + $s[$i] + ord($key[$i % $keyLength])) % 256;
            [$s[$i], $s[$j]] = [$s[$j], $s[$i]]; // Swap
        }

        // Pseudo-random generation algorithm (PRGA)
        $i = $j = 0;
        $result = '';

        for ($y = 0, $dataLength = strlen($data); $y < $dataLength; $y++) {
            $i = ($i + 1) % 256;
            $j = ($j + $s[$i]) % 256;
            [$s[$i], $s[$j]] = [$s[$j], $s[$i]]; // Swap
            $k = $s[($s[$i] + $s[$j]) % 256];
            $result .= chr(ord($data[$y]) ^ $k);
        }

        $endTime = microtime(true);
        $timeTaken = $endTime - $startTime;

        return [
            'decryptedData' => $result,
            'timeTaken' => $timeTaken,
        ];
    }
}
