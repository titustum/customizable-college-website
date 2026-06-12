<?php

namespace App\Enums;

enum CollegeCategory: string
{
    case VTC = 'vtc';
    case TVC = 'tvc';
    case TTC = 'ttc';
    case TTI = 'tti';
    case NP = 'nnp';

    public function label(): string
    {
        return match($this) {
            self::VTC => 'Vocational Training Center (VTC)',
            self::TVC => 'Technical and Vocational College (TVC)',
            self::TTC => 'Technical Training College (TTC)',
            self::TTI => 'Technical Training Institute (TTI)',
            self::NP => 'National Polytechnic (NP)',
        };
    }

    public static function options(): array
    {
        return collect(self::cases())
            ->mapWithKeys(fn ($case) => [$case->value => $case->label()])
            ->toArray();
    }
}
