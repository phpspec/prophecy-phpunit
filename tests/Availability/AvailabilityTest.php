<?php

namespace Prophecy\PhpUnit\Tests\Availability;

use PHPUnit\Framework\TestCase;
use Prophecy\PhpUnit\ProphecyTrait;

/**
 * Testing that the autoloading of the empty `ProphecyTrait` trait for PHPUnit 4.x - 9.1 works correctly.
 *
 * {@internal The code in this file must be PHP cross-version compatible for PHP 5.4 - current!}
 *
 * @coversNothing
 */
final class AvailabilityTest extends TestCase
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
