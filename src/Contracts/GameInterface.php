<?php

namespace Uniqoders\Game\Contracts;

interface GameInterface
{
    /**
     * @return array
     */
    public static function getAvailableGameVariants(): array;
}