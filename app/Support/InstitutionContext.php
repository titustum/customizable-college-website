<?php

namespace App\Support;

class InstitutionContext
{
    protected static ?int $institutionId = null;

    public static function set(?int $id): void
    {
        self::$institutionId = $id;
    }

    public static function id(): ?int
    {
        return self::$institutionId;
    }

    public static function check(): bool
    {
        return ! is_null(self::$institutionId);
    }
}
