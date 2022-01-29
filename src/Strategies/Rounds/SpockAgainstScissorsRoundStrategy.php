<?php

namespace Uniqoders\Game\Strategies\Rounds;

use Uniqoders\Game\Contracts\RoundResultInterface;
use Uniqoders\Game\Factories\Models\RoundResults\RoundResultFactory;

class SpockAgainstScissorsRoundStrategy implements RoundStrategyInterface
{
    /**
     * @return RoundResultInterface
     */
    public function play(): RoundResultInterface
    {
        return RoundResultFactory::getInstance()->createVictoryRoundResult();
    }
}