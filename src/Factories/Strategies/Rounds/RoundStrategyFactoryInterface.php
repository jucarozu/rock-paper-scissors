<?php

namespace Uniqoders\Game\Factories\Strategies\Rounds;

use Uniqoders\Game\Strategies\Rounds\RoundStrategyInterface;

interface RoundStrategyFactoryInterface
{
    /**
     * @param string $roundStrategyClassName
     * @return RoundStrategyInterface
     */
    public static function createRoundStrategy(string $roundStrategyClassName): RoundStrategyInterface;
}