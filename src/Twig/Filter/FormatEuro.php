<?php

namespace App\Twig\Filter;

use Twig\Extension\RuntimeExtensionInterface;

class FormatEuro implements RuntimeExtensionInterface
{
    public function formatEuro(float $amount) : string
    {
        return number_format($amount, 2, ',', ' ') . ' €';
    }
}
