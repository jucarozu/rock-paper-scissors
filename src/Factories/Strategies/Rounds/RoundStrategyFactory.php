<?php

namespace Uniqoders\Game\Factories\Strategies\Rounds;

use Uniqoders\Game\Strategies\Rounds\RoundStrategyInterface;

class RoundStrategyFactory implements RoundStrategyFactoryInterface
{
    /**
     * @param string $roundStrategyClassName
     * @return RoundStrategyInterface
     */
    public static function createRoundStrategy(string $roundStrategyClassName): RoundStrategyInterface
    {
        // Set namespace of round strategies classes
        $roundStrategyNamespace = 'Uniqoders\\Game\\Strategies\\Rounds\\';

        try
        {
            // Get instance from strategy class using reflection
            $roundStrategyClass = new \ReflectionClass($roundStrategyNamespace . $roundStrategyClassName);

            /** @var RoundStrategyInterface $roundStrategyInstance */
            $roundStrategyInstance = $roundStrategyClass->newInstance();
        }
        catch (\ReflectionException $e)
        {
            throw new \InvalidArgumentException("Chosen weapon is invalid.");
        }

        return $roundStrategyInstance;
    }
}