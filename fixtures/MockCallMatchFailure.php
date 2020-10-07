<?php

namespace Prophecy\PhpUnit\Tests\Fixtures;

use PHPUnit\Framework\TestCase;
use Prophecy\PhpUnit\ProphecyTrait;

class MockCallMatchFailure extends TestCase
{
    use ProphecyTrait;

    public function testMethod()
    {
        $prophecy = $this->prophesize('DateTime');

        $prophecy->format('Y-m-d')->shouldBeCalledOnce();

        $double = $prophecy->reveal();

        $double->format('wrong-parameter');

        throw new \RuntimeException('ERROR - mock should have already make this test fail earlier');
    }
}
