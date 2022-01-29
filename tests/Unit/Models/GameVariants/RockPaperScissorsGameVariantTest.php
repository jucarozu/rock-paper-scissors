<?php

namespace Models\GameVariants;

use Uniqoders\Game\Factories\Models\Weapons\WeaponFactory;
use Uniqoders\Game\Models\GameVariants\RockPaperScissorsGameVariant;
use PHPUnit\Framework\TestCase;

class RockPaperScissorsGameVariantTest extends TestCase
{
    /**
     * @return void
     */
    public function testGetAvailableWeapons()
    {
        // Arrange
        $expectedAvailableWeapons[] = WeaponFactory::getInstance()->createRockWeapon();
        $expectedAvailableWeapons[] = WeaponFactory::getInstance()->createPaperWeapon();
        $expectedAvailableWeapons[] = WeaponFactory::getInstance()->createScissorsWeapon();

        // Act
        $actualAvailableWeapons = RockPaperScissorsGameVariant::getAvailableWeapons();

        // Assert
        $this->assertEquals($expectedAvailableWeapons, $actualAvailableWeapons);
    }
}
