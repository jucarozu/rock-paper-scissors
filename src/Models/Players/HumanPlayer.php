<?php

namespace Uniqoders\Game\Models\Players;

class HumanPlayer extends AbstractPlayer
{
    /**
     * @param string $name
     */
    public function __construct(string $name = "Player 1")
    {
        parent::__construct($name);
    }
}