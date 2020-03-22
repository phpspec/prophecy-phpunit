<?php declare(strict_types=1);
namespace Prophecy\PhpUnit\Tests\Fixtures;

use Prophecy\PhpUnit\ProphecyTestCase;

final class Error extends ProphecyTestCase
{
    public function testMethod(): void
    {
        $prophecy = $this->prophesize(\stdClass::class);

        $prophecy->talk()->willReturn('Hello world!');
    }
}
