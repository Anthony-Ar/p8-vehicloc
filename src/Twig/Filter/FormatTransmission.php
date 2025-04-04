<?php

namespace App\Twig\Filter;

use Twig\Extension\RuntimeExtensionInterface;

class FormatTransmission implements RuntimeExtensionInterface
{
    public function formatTransmission(int $transmission) : string
    {
        return $transmission === 0 ? "Manuelle" : ($transmission === 1 ? "Automatique" : "Inconnu");
    }
}
