<?php

namespace Uniqoders\Game\Models\RoundResults;

class VictoryRoundResult extends AbstractRoundResult
{
    /**
     * @param string $name
     */
    public function __construct(string $name = "Victory")
    {
        parent::__construct($name);
    }
}