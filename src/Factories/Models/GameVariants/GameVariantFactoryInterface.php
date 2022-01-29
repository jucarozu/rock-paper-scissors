<?php

namespace Uniqoders\Game\Factories\Models\GameVariants;

use Uniqoders\Game\Contracts\GameVariantInterface;

interface GameVariantFactoryInterface
{
    /**
     * @return GameVariantInterface
     */
    public function createRockPaperScissorsGameVariant(): GameVariantInterface;

    /**
     * @return GameVariantInterface
     */
    public function createRockPaperScissorsLizardSpockGameVariant(): GameVariantInterface;
}