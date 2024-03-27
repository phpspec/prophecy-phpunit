<?php

namespace Prophecy\PhpUnit\Tests\PhpstanFixtures;

use PHPUnit\Framework\TestCase;
use Prophecy\PhpUnit\ProphecyTrait;
use Prophecy\Prophecy\ObjectProphecy;

class ExampleUsage extends TestCase
{
    use ProphecyTrait;

    public function testExplicitClass(): void
    {
        $prophecy = $this->prophesize(\DateTimeImmutable::class);

        $this->configureDouble($prophecy);

        $double = $prophecy->reveal();

        $this->checkValue($double->format('Y-m-d'));
    }

    /**
     * @param ObjectProphecy<\DateTimeImmutable> $double
     */
    private function configureDouble(ObjectProphecy $double): void
    {
    }

    private function checkValue(string $value): void
    {
        self::assertNotEmpty($value);
    }
}
