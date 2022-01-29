<?php

namespace Uniqoders\Game\Models\GameVariants;

use Uniqoders\Game\Factories\Models\Weapons\WeaponFactory;

class RockPaperScissorsGameVariant extends AbstractGameVariant
{
    /**
     * @var array|null
     */
    private static ?array $availableWeapons = null;

    /**
     * @param string $name
     */
    public function __construct(string $name = "Rock Paper Scissors")
    {
        parent::__construct($name);
    }

    /**
     * @return array
     */
    public static function getAvailableWeapons(): array
    {
        if (is_null(self::$availableWeapons))
        {
            self::$availableWeapons = array(
                0 => WeaponFactory::getInstance()->createRockWeapon(),
                1 => WeaponFactory::getInstance()->createPaperWeapon(),
                2 => WeaponFactory::getInstance()->createScissorsWeapon()
            );
        }

        return self::$availableWeapons;
    }
}