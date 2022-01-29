<?php

namespace Uniqoders\Game\Models\Games;

use Uniqoders\Game\Contracts\GameInterface;
use Uniqoders\Game\Factories\Models\GameVariants\GameVariantFactory;

class Game implements GameInterface
{
    /**
     * @var array|null
     */
    private static ?array $availableGameVariants = null;

    /**
     * @return array
     */
    public static function getAvailableGameVariants(): array
    {
        if (is_null(self::$availableGameVariants))
        {
            self::$availableGameVariants = array(
                0 => GameVariantFactory::getInstance()->createRockPaperScissorsGameVariant(),
                1 => GameVariantFactory::getInstance()->createRockPaperScissorsLizardSpockGameVariant()
            );
        }

        return self::$availableGameVariants;
    }
}