<?php

namespace Uniqoders\Game\Factories\Models\Weapons;

use Uniqoders\Game\Contracts\WeaponInterface;
use Uniqoders\Game\Models\Weapons\LizardWeapon;
use Uniqoders\Game\Models\Weapons\PaperWeapon;
use Uniqoders\Game\Models\Weapons\RockWeapon;
use Uniqoders\Game\Models\Weapons\ScissorsWeapon;
use Uniqoders\Game\Models\Weapons\SpockWeapon;

class WeaponFactory implements WeaponFactoryInterface
{
    /**
     * @var WeaponFactory|null
     */
    private static ?WeaponFactory $instance = null;

    /**
     *
     */
    private function __construct()
    {
    }

    /**
     * @return WeaponFactory
     */
    public static function getInstance(): WeaponFactory
    {
        if (is_null(self::$instance))
            self::$instance = new WeaponFactory();

        return self::$instance;
    }

    /**
     * @return WeaponInterface
     */
    public function createRockWeapon(): WeaponInterface
    {
        return new RockWeapon();
    }

    /**
     * @return WeaponInterface
     */
    public function createPaperWeapon(): WeaponInterface
    {
        return new PaperWeapon();
    }

    /**
     * @return WeaponInterface
     */
    public function createScissorsWeapon(): WeaponInterface
    {
        return new ScissorsWeapon();
    }

    /**
     * @return WeaponInterface
     */
    public function createLizardWeapon(): WeaponInterface
    {
        return new LizardWeapon();
    }

    /**
     * @return WeaponInterface
     */
    public function createSpockWeapon(): WeaponInterface
    {
        return new SpockWeapon();
    }
}