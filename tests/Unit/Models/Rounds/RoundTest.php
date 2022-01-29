<?php

namespace Models\Rounds;

use Uniqoders\Game\Factories\Models\RoundResults\RoundResultFactory;
use Uniqoders\Game\Factories\Models\Rounds\RoundFactory;
use Uniqoders\Game\Factories\Strategies\Rounds\RoundStrategyFactory;
use PHPUnit\Framework\TestCase;

class RoundTest extends TestCase
{
    /**
     * @return void
     */
    public function testPlayWhenItReceivesAValidStrategy()
    {
        // Arrange
        $round = RoundFactory::getInstance()->createRound();
        $expectedRoundResult = RoundResultFactory::getInstance()->createDrawRoundResult();

        // Act
        $round->setStrategy(
            RoundStrategyFactory::createRoundStrategy('RockAgainstRockRoundStrategy')
        );

        $actualRoundResult = $round->play();

        // Assert
        $this->assertEquals($expectedRoundResult, $actualRoundResult);
    }

    /**
     * @return void
     */
    public function testPlayWhenItReceivesAnInvalidStrategy()
    {
        // Arrange
        $round = RoundFactory::getInstance()->createRound();

        // Assert
        $this->expectException(\InvalidArgumentException::class);

        // Act
        $round->setStrategy(
            RoundStrategyFactory::createRoundStrategy('DummyRoundStrategy')
        );
    }
}
