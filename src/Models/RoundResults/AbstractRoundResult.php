<?php

namespace Uniqoders\Game\Models\RoundResults;

use Uniqoders\Game\Contracts\RoundResultInterface;

class AbstractRoundResult implements RoundResultInterface
{
    /**
     * @var string
     */
    private string $name;

    /**
     * @param string $name
     */
    public function __construct(string $name)
    {
        $this->setName($name);
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
}