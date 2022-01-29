<?php

namespace Uniqoders\Game\Factories\Models\Weapons;

use Uniqoders\Game\Contracts\WeaponInterface;

interface WeaponFactoryInterface
{
    /**
     * @return WeaponInterface
     */
    public function createRockWeapon(): WeaponInterface;

    /**
     * @return WeaponInterface
     */
    public function createPaperWeapon(): WeaponInterface;

    /**
     * @return WeaponInterface
     */
    public function createScissorsWeapon(): WeaponInterface;

    /**
     * @return WeaponInterface
     */
    public function createLizardWeapon(): WeaponInterface;

    /**
     * @return WeaponInterface
     */
    public function createSpockWeapon(): WeaponInterface;
}