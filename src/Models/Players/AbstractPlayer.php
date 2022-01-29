<?php

namespace Uniqoders\Game\Models\Players;

use Uniqoders\Game\Contracts\PlayerInterface;
use Uniqoders\Game\Contracts\WeaponInterface;

abstract class AbstractPlayer implements PlayerInterface
{
    /**
     * @var string
     */
    private string $name;

    /**
     * @var int
     */
    private int $totalVictories;

    /**
     * @var int
     */
    private int $totalDefeats;

    /**
     * @var int
     */
    private int $totalDraws;

    /**
     * @var WeaponInterface
     */
    private WeaponInterface $chosenWeapon;

    /**
     * @param string $name
     * @param int $totalVictories
     * @param int $totalDefeats
     * @param int $totalDraws
     */
    public function __construct(string $name, int $totalVictories = 0, int $totalDefeats = 0, int $totalDraws = 0)
    {
        $this->setName($name);
        $this->setTotalVictories($totalVictories);
        $this->setTotalDefeats($totalDefeats);
        $this->setTotalDraws($totalDraws);
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return void
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return int
     */
    public function getTotalVictories(): int
    {
        return $this->totalVictories;
    }

    /**
     * @param int $totalVictories
     * @return void
     */
    public function setTotalVictories(int $totalVictories): void
    {
        $this->totalVictories = $totalVictories;
    }

    /**
     * @return void
     */
    public function increaseTotalVictories(): void
    {
        $this->totalVictories++;
    }

    /**
     * @return int
     */
    public function getTotalDraws(): int
    {
        return $this->totalDraws;
    }

    /**
     * @param int $totalDraws
     * @return void
     */
    public function setTotalDraws(int $totalDraws): void
    {
        $this->totalDraws = $totalDraws;
    }

    /**
     * @return void
     */
    public function increaseTotalDraws(): void
    {
        $this->totalDraws++;
    }

    /**
     * @return int
     */
    public function getTotalDefeats(): int
    {
        return $this->totalDefeats;
    }

    /**
     * @param int $totalDefeats
     * @return void
     */
    public function setTotalDefeats(int $totalDefeats): void
    {
        $this->totalDefeats = $totalDefeats;
    }

    /**
     * @return void
     */
    public function increaseTotalDefeats(): void
    {
        $this->totalDefeats++;
    }

    /**
     * @return WeaponInterface
     */
    public function getChosenWeapon(): WeaponInterface
    {
        return $this->chosenWeapon;
    }

    /**
     * @param WeaponInterface $chosenWeapon
     * @return void
     */
    public function setChosenWeapon(WeaponInterface $chosenWeapon): void
    {
        $this->chosenWeapon = $chosenWeapon;
    }
}