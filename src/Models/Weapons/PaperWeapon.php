<?php

namespace Uniqoders\Game\Models\Weapons;

class PaperWeapon extends AbstractWeapon
{
    /**
     * @param string $name
     */
    public function __construct(string $name = "Paper")
    {
        parent::__construct($name);
    }
}