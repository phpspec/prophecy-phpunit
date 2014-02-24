<?php

namespace Prophecy\PHPUnit\Tests\Fixtures;

use Prophecy\PHPUnit\ProphecyTestCase;

class FailureInTearDown extends ProphecyTestCase
{
    public function testMethod()
    {
        $prophecy = $this->prophesize('DateTime');

        $prophecy->format('Y-m-d')->shouldBeCalledTimes(2);

        $double = $prophecy->reveal();

        $double->format('Y-m-d');
    }
}
