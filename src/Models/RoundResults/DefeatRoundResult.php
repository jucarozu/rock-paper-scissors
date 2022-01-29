<?php

namespace Uniqoders\Game\Models\RoundResults;

class DefeatRoundResult extends AbstractRoundResult
{
    /**
     * @param string $name
     */
    public function __construct(string $name = "Defeat")
    {
        parent::__construct($name);
    }
}