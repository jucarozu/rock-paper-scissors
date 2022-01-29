<?php

namespace Uniqoders\Game\Factories\Models\Players;

use Uniqoders\Game\Contracts\PlayerInterface;

interface PlayerFactoryInterface
{
    /**
     * @param string $name
     * @return PlayerInterface
     */
    public function createHumanPlayer(string $name): PlayerInterface;

    /**
     * @param string $name
     * @return PlayerInterface
     */
    public function createComputerPlayer(string $name): PlayerInterface;
}