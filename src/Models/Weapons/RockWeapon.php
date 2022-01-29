<?php

namespace Uniqoders\Game\Models\Weapons;

class RockWeapon extends AbstractWeapon
{
    /**
     * @param string $name
     */
    public function __construct(string $name = "Rock")
    {
        parent::__construct($name);
    }
}