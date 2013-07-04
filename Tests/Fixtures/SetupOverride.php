<?php

namespace Prophecy\PhpUnit\Tests\Fixtures;

use Prophecy\PhpUnit\ProphecyTestCase;

class SetupOverride extends ProphecyTestCase
{
    protected function setUp()
    {
        // Not calling the parent method is an error.
    }

    public function testMethod()
    {
        $this->prophesize('stdClass');
    }
}
