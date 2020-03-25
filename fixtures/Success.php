<?php

namespace Prophecy\PhpUnit\Tests\Fixtures;

use PHPUnit\Framework\TestCase;
use Prophecy\PhpUnit\ProphecyTrait;

class Success extends TestCase
{
    use ProphecyTrait;

    public function testMethod()
    {
        $prophecy = $this->prophesize('DateTime');

        $prophecy->format('Y-m-d')->shouldBeCalled();

        $double = $prophecy->reveal();

        $double->format('Y-m-d');
    }
}
