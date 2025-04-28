<?php

namespace App\Enum;

enum CarType: int
{
    case MANUAL = 0;
    case AUTOMATIC = 1;

    public function label(): string
    {
        return match($this) {
            self::MANUAL => 'Manuelle',
            self::AUTOMATIC => 'Automatique',
        };
    }
}
