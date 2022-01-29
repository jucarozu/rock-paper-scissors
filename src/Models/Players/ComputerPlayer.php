<?php

namespace Uniqoders\Game\Models\Players;

class ComputerPlayer extends AbstractPlayer
{
    /**
     * @param string $name
     */
    public function __construct(string $name = "Computer")
    {
        parent::__construct($name);
    }
}