<?php

namespace Uniqoders\Tests\Integration;

use PHPUnit\Framework\TestCase;
use Symfony\Component\Console\Application;

class IntegrationTestCase extends TestCase
{
    /**
     * @var Application
     */
    protected $application;

    /**
     * This method is called before each test.
     */
    protected function setUp(): void
    {
        parent::setUp();

        $this->application = new Application();
    }
}
