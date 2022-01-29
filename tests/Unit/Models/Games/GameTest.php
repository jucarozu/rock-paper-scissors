<?php

namespace Models\Games;

use Uniqoders\Game\Factories\Models\GameVariants\GameVariantFactory;
use Uniqoders\Game\Models\Games\Game;
use PHPUnit\Framework\TestCase;

class GameTest extends TestCase
{
    /**
     * @return void
     */
    public function testGetAvailableGameVariants()
    {
        // Arrange
        $expectedAvailableGameVariants[] = GameVariantFactory::getInstance()->createRockPaperScissorsGameVariant();
        $expectedAvailableGameVariants[] = GameVariantFactory::getInstance()->createRockPaperScissorsLizardSpockGameVariant();

        // Act
        $actualAvailableGameVariants = Game::getAvailableGameVariants();

        // Assert
        $this->assertEquals($expectedAvailableGameVariants, $actualAvailableGameVariants);
    }
}
