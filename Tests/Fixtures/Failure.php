<?php

namespace Prophecy\PHPUnit\Tests\Fixtures;

use Prophecy\PHPUnit\ProphecyTestCase;

class Failure extends ProphecyTestCase
{
    public function testMethod()
    {
        $prophecy = $this->prophesize('DateTime');

        $prophecy->reveal();

        $prophecy->format('Y-m-d')->shouldHaveBeenCalled();
    }
}
