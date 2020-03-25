<?php

namespace Prophecy\PhpUnit\Tests\Fixtures;

use PHPUnit\Framework\TestCase;
use Prophecy\PhpUnit\ProphecyTrait;

class SpyFailure extends TestCase
{
    use ProphecyTrait;

    public function testMethod()
    {
        $prophecy = $this->prophesize('DateTime');

        $prophecy->reveal();

        $prophecy->format('Y-m-d')->shouldHaveBeenCalled();
    }
}
