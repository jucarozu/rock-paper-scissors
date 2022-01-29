<?php

namespace Uniqoders\Game\Factories\Models\Players;

use Uniqoders\Game\Contracts\PlayerInterface;
use Uniqoders\Game\Models\Players\HumanPlayer;
use Uniqoders\Game\Models\Players\ComputerPlayer;

class PlayerFactory implements PlayerFactoryInterface
{
    /**
     * @var PlayerFactory|null
     */
    private static ?PlayerFactory $instance = null;

    /**
     *
     */
    private function __construct()
    {
    }

    /**
     * @return PlayerFactory
     */
    public static function getInstance(): PlayerFactory
    {
        if (is_null(self::$instance))
            self::$instance = new PlayerFactory();

        return self::$instance;
    }

    /**
     * @param string $name
     * @return PlayerInterface
     */
    public function createHumanPlayer(string $name = "Player 1"): PlayerInterface
    {
        return new HumanPlayer($name);
    }

    /**
     * @param string $name
     * @return PlayerInterface
     */
    public function createComputerPlayer(string $name = "Computer"): PlayerInterface
    {
        return new ComputerPlayer($name);
    }
}