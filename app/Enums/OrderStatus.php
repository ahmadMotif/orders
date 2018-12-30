<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

final class OrderStatus extends Enum
{
    const newOrder = 0;
    const Administrator = 1;
    const Arbitrator = 2;
    const LanguageChecker = 3;
    const TechnicalProducer = 4;
    const Finance = 5;
    const Print = 6;
}
