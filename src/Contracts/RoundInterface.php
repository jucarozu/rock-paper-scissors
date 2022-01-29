<?php

namespace Uniqoders\Game\Contracts;

use Uniqoders\Game\Strategies\Rounds\RoundStrategyInterface;

interface RoundInterface
{
    /**
     * @param RoundStrategyInterface $roundStrategy
     * @return void
     */
    public function setStrategy(RoundStrategyInterface $roundStrategy): void;

    /**
     * @return RoundResultInterface
     */
    public function play(): RoundResultInterface;
}