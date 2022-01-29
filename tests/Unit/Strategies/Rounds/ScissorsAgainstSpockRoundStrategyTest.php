<?php

namespace Strategies\Rounds;

use Uniqoders\Game\Factories\Models\RoundResults\RoundResultFactory;
use Uniqoders\Game\Strategies\Rounds\ScissorsAgainstSpockRoundStrategy;
use PHPUnit\Framework\TestCase;

class ScissorsAgainstSpockRoundStrategyTest extends TestCase
{
    /**
     * @return void
     */
    public function testPlay()
    {
        // Arrange
        $roundStrategy = new ScissorsAgainstSpockRoundStrategy();
        $expectedRoundResult = RoundResultFactory::getInstance()->createDefeatRoundResult();

        // Act
        $actualRoundResult = $roundStrategy->play();

        // Assert
        $this->assertEquals($expectedRoundResult, $actualRoundResult);
    }
}
