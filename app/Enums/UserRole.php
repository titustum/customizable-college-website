<?php

namespace App\Enums;

use BackedEnum;
use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasIcon;
use Filament\Support\Contracts\HasLabel;
use Filament\Support\Icons\Heroicon;
use Illuminate\Contracts\Support\Htmlable;

enum UserRole: string implements HasColor, HasIcon, HasLabel
{
    case Admin = 'admin';

    case WebAdmin = 'webadmin';

    case Registrar = 'registrar';

    case User = 'user';

    public function getLabel(): string
    {
        return match ($this) {
            self::Admin => 'Admin',
            self::WebAdmin => 'Web Admin',
            self::Registrar => 'Registrar',
            self::User => 'User',
        };
    }

    public function getColor(): string|array|null
    {
        return match ($this) {
            self::Admin => 'danger',
            self::WebAdmin => 'warning',
            self::Registrar => 'info',
            self::User => 'gray',
        };
    }

    public function getIcon(): string|BackedEnum|Htmlable|null
    {
        return match ($this) {
            self::Admin => Heroicon::ShieldCheck,
            self::WebAdmin => Heroicon::Cog6Tooth,
            self::Registrar => Heroicon::ClipboardDocumentList,
            self::User => Heroicon::UserCircle,
        };
    }

    public static function options(): array
    {
        return collect(self::cases())
            ->mapWithKeys(fn ($case) => [$case->value => $case->getLabel()])
            ->toArray();
    }
}
