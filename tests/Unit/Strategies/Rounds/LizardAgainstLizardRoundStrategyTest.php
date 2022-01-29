<?php

namespace Strategies\Rounds;

use Uniqoders\Game\Factories\Models\RoundResults\RoundResultFactory;
use Uniqoders\Game\Strategies\Rounds\LizardAgainstLizardRoundStrategy;
use PHPUnit\Framework\TestCase;

class LizardAgainstLizardRoundStrategyTest extends TestCase
{
    /**
     * @return void
     */
    public function testPlay()
    {
        // Arrange
        $roundStrategy = new LizardAgainstLizardRoundStrategy();
        $expectedRoundResult = RoundResultFactory::getInstance()->createDrawRoundResult();

        // Act
        $actualRoundResult = $roundStrategy->play();

        // Assert
        $this->assertEquals($expectedRoundResult, $actualRoundResult);
    }
}
