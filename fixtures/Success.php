<?php

namespace Prophecy\PhpUnit\Tests\Fixtures;

use PHPUnit\Framework\TestCase;
use Prophecy\PhpUnit\ProphecyTrait;

/**
 * {@internal The code in this file must be PHP cross-version compatible for PHP 5.4 - current
 * as this test is also used in the AvailabilityTest.}
 */
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
