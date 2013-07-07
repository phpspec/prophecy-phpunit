<?php

namespace Prophecy\PHPUnit\Tests\Fixtures;

use Prophecy\PHPUnit\ProphecyTestCase;

class Success extends ProphecyTestCase
{
    public function testMethod()
    {
        $prophecy = $this->prophesize('DateTime');

        $prophecy->format('Y-m-d')->shouldBeCalled();

        $double = $prophecy->reveal();

        $double->format('Y-m-d');
    }
}
