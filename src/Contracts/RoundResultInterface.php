<?php

namespace Uniqoders\Game\Contracts;

interface RoundResultInterface
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
}