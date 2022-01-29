<?php

namespace Uniqoders\Game\Factories\Models\Rounds;

use Uniqoders\Game\Contracts\RoundInterface;

interface RoundFactoryInterface
{
    /**
     * @return RoundInterface
     */
    public function createRound(): RoundInterface;
}