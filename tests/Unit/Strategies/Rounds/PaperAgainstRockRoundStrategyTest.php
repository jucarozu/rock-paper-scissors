<?php

namespace Strategies\Rounds;

use Uniqoders\Game\Factories\Models\RoundResults\RoundResultFactory;
use Uniqoders\Game\Strategies\Rounds\PaperAgainstRockRoundStrategy;
use PHPUnit\Framework\TestCase;

class PaperAgainstRockRoundStrategyTest extends TestCase
{
    /**
     * @return void
     */
    public function testPlay()
    {
        // Arrange
        $roundStrategy = new PaperAgainstRockRoundStrategy();
        $expectedRoundResult = RoundResultFactory::getInstance()->createVictoryRoundResult();

        // Act
        $actualRoundResult = $roundStrategy->play();

        // Assert
        $this->assertEquals($expectedRoundResult, $actualRoundResult);
    }
}
