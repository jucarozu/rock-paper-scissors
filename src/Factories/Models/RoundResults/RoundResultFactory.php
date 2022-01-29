<?php

namespace Uniqoders\Game\Factories\Models\RoundResults;

use Uniqoders\Game\Contracts\RoundResultInterface;
use Uniqoders\Game\Models\RoundResults\DefeatRoundResult;
use Uniqoders\Game\Models\RoundResults\DrawRoundResult;
use Uniqoders\Game\Models\RoundResults\VictoryRoundResult;

class RoundResultFactory implements RoundResultFactoryInterface
{
    /**
     * @var RoundResultFactory|null
     */
    private static ?RoundResultFactory $instance = null;

    /**
     *
     */
    private function __construct()
    {
    }

    /**
     * @return RoundResultFactory
     */
    public static function getInstance(): RoundResultFactory
    {
        if (is_null(self::$instance))
            self::$instance = new RoundResultFactory();

        return self::$instance;
    }

    /**
     * @return RoundResultInterface
     */
    public function createVictoryRoundResult(): RoundResultInterface
    {
        return new VictoryRoundResult();
    }

    /**
     * @return RoundResultInterface
     */
    public function createDefeatRoundResult(): RoundResultInterface
    {
        return new DefeatRoundResult();
    }

    /**
     * @return RoundResultInterface
     */
    public function createDrawRoundResult(): RoundResultInterface
    {
        return new DrawRoundResult();
    }
}