<?php

namespace PAPI\Mod\Dotenv\Tests;

use PAPI\Core\SlimBuilderException;
use PAPI\Core\Tests\SlimBuilderTestCase;
use PAPI\Mod\Dotenv\DotenvEvent;
use PHPUnit\Framework\Attributes\CoversClass;

#[CoversClass(DotenvEvent::class)]
class DotenvTest extends SlimBuilderTestCase
{
    public function setUp(): void
    {
        parent::setUp();
        define("DOTENV_PATH", __DIR__ . "/resources/.env");
    }

    public function testLoadEnvironment(): void
    {
        try {
            $this->builder
                ->addEvent(DotenvEvent::class)
                ->build();

            $this->assertTrue(isset($_ENV["HELLO"]));
            $this->assertEquals("WORLD", $_ENV["HELLO"]);
        } catch (SlimBuilderException $exception) {
            $this->fail($exception->getMessage());
        }
    }
}
