<?php

namespace Uniqoders\Game\Strategies\Rounds;

use Uniqoders\Game\Contracts\RoundResultInterface;

interface RoundStrategyInterface
{
    /**
     * @return RoundResultInterface
     */
    public function play(): RoundResultInterface;
}