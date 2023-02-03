<?php

namespace Prophecy\PhpUnit\Tests\Fixtures;

use PHPUnit\Framework\TestCase;
use Prophecy\PhpUnit\ProphecyTrait;

class NoClass extends TestCase
{
    use ProphecyTrait;

    public function testProphesizeWithoutArguments(): void
    {
        $prophecy = $this->prophesize()->reveal();
        
        $this->assertInstanceOf(\stdClass::class, $prophecy);
    }
}
