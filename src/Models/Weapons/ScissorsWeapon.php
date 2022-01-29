<?php

namespace Uniqoders\Game\Models\Weapons;

class ScissorsWeapon extends AbstractWeapon
{
    /**
     * @param string $name
     */
    public function __construct(string $name = "Scissors")
    {
        parent::__construct($name);
    }
}