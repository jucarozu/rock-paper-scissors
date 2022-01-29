<?php

namespace Uniqoders\Game\Factories\Models\Rounds;

use Uniqoders\Game\Contracts\RoundInterface;
use Uniqoders\Game\Models\Rounds\Round;

class RoundFactory implements RoundFactoryInterface
{
    /**
     * @var RoundFactory|null
     */
    private static ?RoundFactory $instance = null;

    /**
     *
     */
    private function __construct()
    {
    }

    /**
     * @return RoundFactory
     */
    public static function getInstance(): RoundFactory
    {
        if (is_null(self::$instance))
            self::$instance = new RoundFactory();

        return self::$instance;
    }

    /**
     * @return RoundInterface
     */
    public function createRound(): RoundInterface
    {
        return new Round();
    }
}