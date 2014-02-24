<?php

namespace Prophecy\PHPUnit\Tests\Fixtures;

use Prophecy\PHPUnit\ProphecyTestCase;

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
