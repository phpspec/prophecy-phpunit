<?php declare(strict_types=1);

namespace Prophecy\PhpUnit;

use PHPUnit\Framework\TestCase;

abstract class ProphecyTestCase extends TestCase
{
    use ProphecyTrait;

    protected function verifyMockObjects(): void
    {
        parent::verifyMockObjects();

        $this->verifyProphecyDoubles();
    }
}
