<?php

namespace Prophecy\PHPUnit\Tests\Fixtures;

use Prophecy\PHPUnit\ProphecyTestCase;

class Error extends ProphecyTestCase
{
    public function testMethod()
    {
        $prophecy = $this->prophesize('stdClass');

        $prophecy->talk()->willReturn('Hello world!');
    }
}
