<?php

namespace Src\Utils;

use Error;

class HashUtility
{
    public static function md5(string $valueToHash, ?int $hashLength = null)
    {
        $hash = strtoupper(md5($valueToHash));

        if (is_null($hashLength)) return $hash;

        if ($hashLength > 32 || $hashLength < 1)
            throw new Error('[MD5] Hash length must be between 1 and 32');

        return substr($hash, 0, $hashLength);
    }

    public static function sha256WithEnvPepper(string $valueToHash, ?int $hashLength = null)
    {
        $pepperedValue = $valueToHash . $_ENV['ETL_HASH_PEPPER'];
        $hash = strtoupper(hash('sha256', $pepperedValue));

        if (is_null($hashLength)) return $hash;

        if ($hashLength > 64 || $hashLength < 1)
            throw new Error('[SHA-256] Hash length must be between 1 and 64');

        return substr($hash, 0, $hashLength);
    }
}
