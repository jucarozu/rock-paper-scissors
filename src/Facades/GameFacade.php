<?php

namespace Uniqoders\Game\Facades;

use Uniqoders\Game\Contracts\RoundResultInterface;
use Uniqoders\Game\Contracts\WeaponInterface;
use Uniqoders\Game\Factories\Models\Rounds\RoundFactory;
use Uniqoders\Game\Factories\Strategies\Rounds\RoundStrategyFactory;

class GameFacade
{
    /**
     * @param WeaponInterface $humanWeapon
     * @param WeaponInterface $computerWeapon
     * @return RoundResultInterface
     */
    public static function getRoundResult(WeaponInterface $humanWeapon,
                                          WeaponInterface $computerWeapon): RoundResultInterface
    {
        // Set class name from selected weapons
        $roundStrategyClassName = $humanWeapon->getName() . 'Against' . $computerWeapon->getName() . 'RoundStrategy';

        // Create new corresponding RoundStrategy instance
        $roundStrategyInstance = RoundStrategyFactory::createRoundStrategy($roundStrategyClassName);

        // Get round result from the corresponding strategy
        $round = RoundFactory::getInstance()->createRound();
        $round->setStrategy($roundStrategyInstance);

        return $round->play();
    }
}