<?php

namespace Prophecy\PhpUnit\Tests\Fixtures;

use PHPUnit\Framework\TestCase;
use Prophecy\PhpUnit\ProphecyTrait;

class WrongCall extends TestCase
{
    use ProphecyTrait;

    public function testMethod()
    {
        $prophecy = $this->prophesize('stdClass');

        $prophecy->talk()->willReturn('Hello world!');
    }
}
