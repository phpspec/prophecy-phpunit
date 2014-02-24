<?php

namespace Prophecy\PHPUnit\Tests;

use Prophecy\PHPUnit\Tests\Fixtures\Error;
use Prophecy\PHPUnit\Tests\Fixtures\Failure;
use Prophecy\PHPUnit\Tests\Fixtures\FailureInTearDown;
use Prophecy\PHPUnit\Tests\Fixtures\SetupOverride;
use Prophecy\PHPUnit\Tests\Fixtures\Success;

class ProphecyTestCaseTest extends \PHPUnit_Framework_TestCase
{
    public function testSuccess()
    {
        $test = new Success('testMethod');
        $result = $test->run();

        $this->assertEquals(0, $result->errorCount());
        $this->assertEquals(0, $result->failureCount());
        $this->assertCount(1, $result);
    }

    public function testPredictionFailureInTest()
    {
        $test = new Failure('testMethod');
        $result = $test->run();

        $this->assertEquals(0, $result->errorCount());
        $this->assertEquals(1, $result->failureCount());
        $this->assertCount(1, $result);
    }

    public function testPredictionFailureInTearDown()
    {
        $test = new FailureInTearDown('testMethod');
        $result = $test->run();

        $this->assertEquals(0, $result->errorCount());
        $this->assertEquals(1, $result->failureCount());
        $this->assertCount(1, $result);
    }

    public function testDoublingError()
    {
        $test = new Error('testMethod');
        $result = $test->run();

        $this->assertEquals(1, $result->errorCount());
        $this->assertEquals(0, $result->failureCount());
        $this->assertCount(1, $result);
    }

    public function testBadSetupOverride()
    {
        $test = new SetupOverride('testMethod');
        $result = $test->run();

        $this->assertEquals(1, $result->errorCount());
        $this->assertEquals(0, $result->failureCount());
        $this->assertCount(1, $result);
    }
}
