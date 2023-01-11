<?php

namespace Prophecy\PhpUnit\Tests\Fixtures;

use PHPUnit\Framework\TestCase;
use Prophecy\PhpUnit\ProphecyTrait;

class NoProphecy extends TestCase
{
    use ProphecyTrait;

    public function testMethod()
    {
        $this->assertTrue(true);
    }
}
