<?php

namespace Strategies\Rounds;

use Uniqoders\Game\Factories\Models\RoundResults\RoundResultFactory;
use Uniqoders\Game\Strategies\Rounds\PaperAgainstScissorsRoundStrategy;
use PHPUnit\Framework\TestCase;

class PaperAgainstScissorsRoundStrategyTest extends TestCase
{
    /**
     * @return void
     */
    public function testPlay()
    {
        // Arrange
        $roundStrategy = new PaperAgainstScissorsRoundStrategy();
        $expectedRoundResult = RoundResultFactory::getInstance()->createDefeatRoundResult();

        // Act
        $actualRoundResult = $roundStrategy->play();

        // Assert
        $this->assertEquals($expectedRoundResult, $actualRoundResult);
    }
}
