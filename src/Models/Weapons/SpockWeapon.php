<?php

namespace Uniqoders\Game\Models\Weapons;

class SpockWeapon extends AbstractWeapon
{
    /**
     * @param string $name
     */
    public function __construct(string $name = "Spock")
    {
        parent::__construct($name);
    }
}