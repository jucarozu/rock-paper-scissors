<?php

namespace Strategies\Rounds;

use Uniqoders\Game\Factories\Models\RoundResults\RoundResultFactory;
use Uniqoders\Game\Strategies\Rounds\RockAgainstPaperRoundStrategy;
use PHPUnit\Framework\TestCase;

class RockAgainstPaperRoundStrategyTest extends TestCase
{
    /**
     * @return void
     */
    public function testPlay()
    {
        // Arrange
        $roundStrategy = new RockAgainstPaperRoundStrategy();
        $expectedRoundResult = RoundResultFactory::getInstance()->createDefeatRoundResult();

        // Act
        $actualRoundResult = $roundStrategy->play();

        // Assert
        $this->assertEquals($expectedRoundResult, $actualRoundResult);
    }
}
