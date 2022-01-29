<?php

namespace Strategies\Rounds;

use Uniqoders\Game\Factories\Models\RoundResults\RoundResultFactory;
use Uniqoders\Game\Strategies\Rounds\ScissorsAgainstScissorsRoundStrategy;
use PHPUnit\Framework\TestCase;

class ScissorsAgainstScissorsRoundStrategyTest extends TestCase
{
    /**
     * @return void
     */
    public function testPlay()
    {
        // Arrange
        $roundStrategy = new ScissorsAgainstScissorsRoundStrategy();
        $expectedRoundResult = RoundResultFactory::getInstance()->createDrawRoundResult();

        // Act
        $actualRoundResult = $roundStrategy->play();

        // Assert
        $this->assertEquals($expectedRoundResult, $actualRoundResult);
    }
}
