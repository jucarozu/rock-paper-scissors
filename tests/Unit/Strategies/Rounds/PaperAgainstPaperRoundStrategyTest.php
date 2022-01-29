<?php

namespace Strategies\Rounds;

use Uniqoders\Game\Factories\Models\RoundResults\RoundResultFactory;
use Uniqoders\Game\Strategies\Rounds\PaperAgainstPaperRoundStrategy;
use PHPUnit\Framework\TestCase;

class PaperAgainstPaperRoundStrategyTest extends TestCase
{
    /**
     * @return void
     */
    public function testPlay()
    {
        // Arrange
        $roundStrategy = new PaperAgainstPaperRoundStrategy();
        $expectedRoundResult = RoundResultFactory::getInstance()->createDrawRoundResult();

        // Act
        $actualRoundResult = $roundStrategy->play();

        // Assert
        $this->assertEquals($expectedRoundResult, $actualRoundResult);
    }
}
