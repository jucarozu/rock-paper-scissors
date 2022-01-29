<?php

namespace Uniqoders\Game\Models\Rounds;

use Uniqoders\Game\Contracts\RoundInterface;
use Uniqoders\Game\Contracts\RoundResultInterface;
use Uniqoders\Game\Strategies\Rounds\RoundStrategyInterface;

class Round implements RoundInterface
{
    /**
     * @var RoundStrategyInterface
     */
    private RoundStrategyInterface $roundStrategy;

    /**
     * @param RoundStrategyInterface $roundStrategy
     * @return void
     */
    public function setStrategy(RoundStrategyInterface $roundStrategy): void
    {
        $this->roundStrategy = $roundStrategy;
    }

    /**
     * @return RoundResultInterface
     */
    public function play(): RoundResultInterface
    {
        return $this->roundStrategy->play();
    }
}