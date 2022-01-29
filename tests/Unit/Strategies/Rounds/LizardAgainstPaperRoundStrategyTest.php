<?php

namespace Strategies\Rounds;

use Uniqoders\Game\Factories\Models\RoundResults\RoundResultFactory;
use Uniqoders\Game\Strategies\Rounds\LizardAgainstPaperRoundStrategy;
use PHPUnit\Framework\TestCase;

class LizardAgainstPaperRoundStrategyTest extends TestCase
{
    /**
     * @return void
     */
    public function testPlay()
    {
        // Arrange
        $roundStrategy = new LizardAgainstPaperRoundStrategy();
        $expectedRoundResult = RoundResultFactory::getInstance()->createVictoryRoundResult();

        // Act
        $actualRoundResult = $roundStrategy->play();

        // Assert
        $this->assertEquals($expectedRoundResult, $actualRoundResult);
    }
}
