<?php

namespace Uniqoders\Game\Contracts;

interface GameVariantInterface
{
    /**
     * @return string
     */
    public function getName(): string;

    /**
     * @param string $name
     * @return void
     */
    public function setName(string $name): void;

    /**
     * @return array
     */
    public static function getAvailableWeapons(): array;
}