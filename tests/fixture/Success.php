<?php declare(strict_types=1);
namespace Prophecy\PhpUnit\Tests\Fixtures;

use Prophecy\PhpUnit\ProphecyTestCase;

final class Success extends ProphecyTestCase
{
    public function testMethod(): void
    {
        $prophecy = $this->prophesize(\DateTime::class);

        $prophecy->format('Y-m-d')->shouldBeCalled();

        $double = $prophecy->reveal();

        $double->format('Y-m-d');
    }
}
