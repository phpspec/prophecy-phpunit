<?php declare(strict_types=1);
namespace Prophecy\PhpUnit\Tests\Fixtures;

use Prophecy\PhpUnit\ProphecyTestCase;

final class MockFailure extends ProphecyTestCase
{
    public function testMethod(): void
    {
        $prophecy = $this->prophesize(\DateTime::class);

        $prophecy->format('Y-m-d')->shouldBeCalledTimes(2);

        $double = $prophecy->reveal();

        $double->format('Y-m-d');
    }
}
