<?php

namespace Strategies\Rounds;

use Uniqoders\Game\Factories\Models\RoundResults\RoundResultFactory;
use Uniqoders\Game\Strategies\Rounds\SpockAgainstScissorsRoundStrategy;
use PHPUnit\Framework\TestCase;

class SpockAgainstScissorsRoundStrategyTest extends TestCase
{
    /**
     * @return void
     */
    public function testPlay()
    {
        // Arrange
        $roundStrategy = new SpockAgainstScissorsRoundStrategy();
        $expectedRoundResult = RoundResultFactory::getInstance()->createVictoryRoundResult();

        // Act
        $actualRoundResult = $roundStrategy->play();

        // Assert
        $this->assertEquals($expectedRoundResult, $actualRoundResult);
    }
}
