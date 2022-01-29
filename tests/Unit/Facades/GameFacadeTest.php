<?php

namespace Facades;

use PHPUnit\Framework\TestCase;
use Uniqoders\Game\Facades\GameFacade;
use Uniqoders\Game\Factories\Models\RoundResults\RoundResultFactory;
use Uniqoders\Game\Factories\Models\Weapons\WeaponFactory;

class GameFacadeTest extends TestCase
{

    public function testGetRoundResultWhenExpectedResultIsVictory()
    {
        // Arrange
        $humanWeapon = WeaponFactory::getInstance()->createRockWeapon();
        $computerWeapon = WeaponFactory::getInstance()->createScissorsWeapon();
        $expectedRoundResult = RoundResultFactory::getInstance()->createVictoryRoundResult();

        // Act
        $actualRoundResult = GameFacade::getRoundResult($humanWeapon, $computerWeapon);

        // Assert
        $this->assertEquals($expectedRoundResult, $actualRoundResult);
    }

    public function testGetRoundResultWhenExpectedResultIsDraw()
    {
        // Arrange
        $humanWeapon = WeaponFactory::getInstance()->createRockWeapon();
        $computerWeapon = WeaponFactory::getInstance()->createRockWeapon();
        $expectedRoundResult = RoundResultFactory::getInstance()->createDrawRoundResult();

        // Act
        $actualRoundResult = GameFacade::getRoundResult($humanWeapon, $computerWeapon);

        // Assert
        $this->assertEquals($expectedRoundResult, $actualRoundResult);
    }

    public function testGetRoundResultWhenExpectedResultIsDefeat()
    {
        // Arrange
        $humanWeapon = WeaponFactory::getInstance()->createRockWeapon();
        $computerWeapon = WeaponFactory::getInstance()->createPaperWeapon();
        $expectedRoundResult = RoundResultFactory::getInstance()->createDefeatRoundResult();

        // Act
        $actualRoundResult = GameFacade::getRoundResult($humanWeapon, $computerWeapon);

        // Assert
        $this->assertEquals($expectedRoundResult, $actualRoundResult);
    }
}
