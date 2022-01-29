<?php

namespace Models\GameVariants;

use Uniqoders\Game\Factories\Models\Weapons\WeaponFactory;
use Uniqoders\Game\Models\GameVariants\RockPaperScissorsLizardSpockGameVariant;
use PHPUnit\Framework\TestCase;

class RockPaperScissorsLizardSpockGameVariantTest extends TestCase
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
        $expectedAvailableWeapons[] = WeaponFactory::getInstance()->createLizardWeapon();
        $expectedAvailableWeapons[] = WeaponFactory::getInstance()->createSpockWeapon();

        // Act
        $actualAvailableWeapons = RockPaperScissorsLizardSpockGameVariant::getAvailableWeapons();

        // Assert
        $this->assertEquals($expectedAvailableWeapons, $actualAvailableWeapons);
    }
}
