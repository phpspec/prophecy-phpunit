<?php declare(strict_types=1);

namespace Prophecy\PhpUnit\Tests;

use PHPUnit\Framework\TestCase;
use PHPUnit\Runner\BaseTestRunner;
use Prophecy\PhpUnit\Tests\Fixtures\Error;
use Prophecy\PhpUnit\Tests\Fixtures\MockFailure;
use Prophecy\PhpUnit\Tests\Fixtures\SpyFailure;
use Prophecy\PhpUnit\Tests\Fixtures\Success;

/**
 * @covers \Prophecy\PhpUnit\ProphecyTrait
 *
 * @requires PHPUnit 9.1
 */
final class ProphecyTraitTest extends TestCase
{
    protected function setUp(): void
    {
        // Define the constant because our tests are running PHPUnit test cases themselves
        if (!\defined('PHPUNIT_TESTSUITE')) {
            \define('PHPUNIT_TESTSUITE', true);
        }
    }

    public function testSuccess(): void
    {
        $test = new Success('testMethod');

        $result = $test->run();

        $this->assertSame(0, $result->errorCount());
        $this->assertSame(0, $result->failureCount());
        $this->assertCount(1, $result);
        $this->assertSame(1, $test->getNumAssertions());
        $this->assertSame(BaseTestRunner::STATUS_PASSED, $test->getStatus());
    }

    public function testSpyPredictionFailure(): void
    {
        $test = new SpyFailure('testMethod');

        $result = $test->run();

        $this->assertSame(0, $result->errorCount());
        $this->assertSame(1, $result->failureCount());
        $this->assertCount(1, $result);
        $this->assertSame(1, $test->getNumAssertions());
        $this->assertSame(BaseTestRunner::STATUS_FAILURE, $test->getStatus());
    }

    public function testMockPredictionFailure(): void
    {
        $test = new MockFailure('testMethod');

        $result = $test->run();

        $this->assertSame(0, $result->errorCount());
        $this->assertSame(1, $result->failureCount());
        $this->assertCount(1, $result);
        $this->assertSame(1, $test->getNumAssertions());
        $this->assertSame(BaseTestRunner::STATUS_FAILURE, $test->getStatus());
    }

    public function testDoublingError(): void
    {
        $test = new Error('testMethod');

        $result = $test->run();

        $this->assertSame(1, $result->errorCount());
        $this->assertSame(0, $result->failureCount());
        $this->assertCount(1, $result);
        $this->assertSame(0, $test->getNumAssertions());
        $this->assertSame(BaseTestRunner::STATUS_ERROR, $test->getStatus());
    }
}
