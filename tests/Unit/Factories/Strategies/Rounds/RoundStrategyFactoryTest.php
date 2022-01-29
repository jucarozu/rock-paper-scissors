<?php

namespace Factories\Strategies\Rounds;

use Uniqoders\Game\Factories\Strategies\Rounds\RoundStrategyFactory;
use PHPUnit\Framework\TestCase;
use Uniqoders\Game\Strategies\Rounds\RockAgainstRockRoundStrategy;

class RoundStrategyFactoryTest extends TestCase
{

    public function testCreateRoundStrategyWhenClassNameIsValid()
    {
        // Arrange
        $roundStrategyClassName = 'RockAgainstRockRoundStrategy';
        $expectedRoundStrategyInstance = new RockAgainstRockRoundStrategy();

        // Act
        $actualRoundStrategyInstance = RoundStrategyFactory::createRoundStrategy($roundStrategyClassName);

        // Assert
        $this->assertEquals($expectedRoundStrategyInstance, $actualRoundStrategyInstance);
    }

    public function testCreateRoundStrategyWhenClassNameIsInvalid()
    {
        // Arrange
        $roundStrategyClassName = 'DummyClassName';

        // Assert
        $this->expectException(\InvalidArgumentException::class);

        // Act
        RoundStrategyFactory::createRoundStrategy($roundStrategyClassName);
    }
}
