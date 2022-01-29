<?php

namespace Strategies\Rounds;

use Uniqoders\Game\Factories\Models\RoundResults\RoundResultFactory;
use Uniqoders\Game\Strategies\Rounds\LizardAgainstRockRoundStrategy;
use PHPUnit\Framework\TestCase;

class LizardAgainstRockRoundStrategyTest extends TestCase
{
    /**
     * @return void
     */
    public function testPlay()
    {
        // Arrange
        $roundStrategy = new LizardAgainstRockRoundStrategy();
        $expectedRoundResult = RoundResultFactory::getInstance()->createDefeatRoundResult();

        // Act
        $actualRoundResult = $roundStrategy->play();

        // Assert
        $this->assertEquals($expectedRoundResult, $actualRoundResult);
    }
}
