<?php

namespace Prophecy\PhpUnit\Tests\Availability;

use PHPUnit\Framework\TestCase;
use Prophecy\PhpUnit\ProphecyTrait;
use Prophecy\PhpUnit\Tests\Fixtures\Success;

/**
 * Testing that the autoloading of the empty `ProphecyTrait` trait for PHPUnit 4.x - 9.0 works correctly.
 *
 * {@internal The code in this file must be PHP cross-version compatible for PHP 5.4 - current!}
 *
 * @coversNothing
 */
final class AvailabilityTest extends TestCase
{
    public function testSuccessfullyCallingProphesizeMethod()
    {
        $this->assertTrue(trait_exists('Prophecy\PhpUnit\ProphecyTrait'), 'Failed to assert that the ProphecyTrait is avialable');

        $test = new Success('testMethod');

        $result = $test->run();

        $this->assertSame(0, $result->errorCount(), 'Error count is not 0');
        $this->assertSame(0, $result->failureCount(), 'Failure count is not 0');
        $this->assertCount(1, $result, 'Result is not 1');
        $this->assertSame(1, $test->getNumAssertions(), 'Number of assertions is not 1');
    }
}
