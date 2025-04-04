<?php

namespace App\Twig;

use App\Twig\Filter\FormatTransmission;
use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;

class AppExtension extends AbstractExtension
{
    public function getFilters() : array
    {
        return [
            new TwigFilter('transmission', [FormatTransmission::class, 'formatTransmission']),
        ];
    }
}
