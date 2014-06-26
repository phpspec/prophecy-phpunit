<?php

namespace Prophecy\PhpUnit\Tests\Fixtures;

use Prophecy\PhpUnit\ProphecyTestCase;

class DoubleAssertion extends ProphecyTestCase
{
    public function testMethod()
    {
        $prophecy = $this->prophesize('DateTime');

        $prophecy->format('Y-m-d')->shouldBeCalled();
        $prophecy->format('Y-m')->shouldBeCalled();

        $double = $prophecy->reveal();

        $double->format('Y-m-d');
        $double->format('Y-m');
    }
}
