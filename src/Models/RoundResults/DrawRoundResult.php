<?php

namespace Uniqoders\Game\Models\RoundResults;

class DrawRoundResult extends AbstractRoundResult
{
    /**
     * @param string $name
     */
    public function __construct(string $name = "Draw")
    {
        parent::__construct($name);
    }
}