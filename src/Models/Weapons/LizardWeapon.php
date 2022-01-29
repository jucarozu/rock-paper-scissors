<?php

namespace Uniqoders\Game\Models\Weapons;

class LizardWeapon extends AbstractWeapon
{
    /**
     * @param string $name
     */
    public function __construct(string $name = "Lizard")
    {
        parent::__construct($name);
    }
}