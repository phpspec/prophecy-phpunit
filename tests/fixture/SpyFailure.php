<?php declare(strict_types=1);
namespace Prophecy\PhpUnit\Tests\Fixtures;

use Prophecy\PhpUnit\ProphecyTestCase;

final class SpyFailure extends ProphecyTestCase
{
    public function testMethod(): void
    {
        $prophecy = $this->prophesize(\DateTime::class);

        $prophecy->reveal();

        $prophecy->format('Y-m-d')->shouldHaveBeenCalled();
    }
}
