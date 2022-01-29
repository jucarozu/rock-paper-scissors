<?php

namespace Strategies\Rounds;

use Uniqoders\Game\Factories\Models\RoundResults\RoundResultFactory;
use Uniqoders\Game\Strategies\Rounds\RockAgainstLizardRoundStrategy;
use PHPUnit\Framework\TestCase;

class RockAgainstLizardRoundStrategyTest extends TestCase
{
    /**
     * @return void
     */
    public function testPlay()
    {
        // Arrange
        $roundStrategy = new RockAgainstLizardRoundStrategy();
        $expectedRoundResult = RoundResultFactory::getInstance()->createVictoryRoundResult();

        // Act
        $actualRoundResult = $roundStrategy->play();

        // Assert
        $this->assertEquals($expectedRoundResult, $actualRoundResult);
    }
}
