<?php

namespace Uniqoders\Game\Factories\Models\GameVariants;

use Uniqoders\Game\Contracts\GameVariantInterface;
use Uniqoders\Game\Models\GameVariants\RockPaperScissorsGameVariant;
use Uniqoders\Game\Models\GameVariants\RockPaperScissorsLizardSpockGameVariant;

class GameVariantFactory implements GameVariantFactoryInterface
{
    /**
     * @var GameVariantFactory|null
     */
    private static ?GameVariantFactory $instance = null;

    /**
     *
     */
    private function __construct()
    {
    }

    /**
     * @return GameVariantFactory
     */
    public static function getInstance(): GameVariantFactory
    {
        if (is_null(self::$instance))
            self::$instance = new GameVariantFactory();

        return self::$instance;
    }

    /**
     * @return GameVariantInterface
     */
    public function createRockPaperScissorsGameVariant(): GameVariantInterface
    {
        return new RockPaperScissorsGameVariant();
    }

    /**
     * @return GameVariantInterface
     */
    public function createRockPaperScissorsLizardSpockGameVariant(): GameVariantInterface
    {
        return new RockPaperScissorsLizardSpockGameVariant();
    }
}