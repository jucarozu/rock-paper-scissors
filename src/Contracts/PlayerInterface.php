<?php

namespace Uniqoders\Game\Contracts;

interface PlayerInterface
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
     * @return int
     */
    public function getTotalVictories(): int;

    /**
     * @param int $totalVictories
     * @return void
     */
    public function setTotalVictories(int $totalVictories): void;

    /**
     * @return void
     */
    public function increaseTotalVictories(): void;

    /**
     * @return int
     */
    public function getTotalDraws(): int;

    /**
     * @param int $totalDraws
     * @return void
     */
    public function setTotalDraws(int $totalDraws): void;

    /**
     * @return void
     */
    public function increaseTotalDraws(): void;

    /**
     * @return int
     */
    public function getTotalDefeats(): int;

    /**
     * @param int $totalDefeats
     * @return void
     */
    public function setTotalDefeats(int $totalDefeats): void;

    /**
     * @return void
     */
    public function increaseTotalDefeats(): void;

    /**
     * @return WeaponInterface
     */
    public function getChosenWeapon(): WeaponInterface;

    /**
     * @param WeaponInterface $chosenWeapon
     * @return void
     */
    public function setChosenWeapon(WeaponInterface $chosenWeapon): void;
}