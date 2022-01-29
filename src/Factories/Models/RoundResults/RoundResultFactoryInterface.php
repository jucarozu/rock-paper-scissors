<?php

namespace Uniqoders\Game\Factories\Models\RoundResults;

use Uniqoders\Game\Contracts\RoundResultInterface;

interface RoundResultFactoryInterface
{
    /**
     * @return RoundResultInterface
     */
    public function createVictoryRoundResult(): RoundResultInterface;

    /**
     * @return RoundResultInterface
     */
    public function createDefeatRoundResult(): RoundResultInterface;

    /**
     * @return RoundResultInterface
     */
    public function createDrawRoundResult(): RoundResultInterface;
}