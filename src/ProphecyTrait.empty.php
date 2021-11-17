<?php

namespace Prophecy\PhpUnit;

/**
 * Prophecy trait for use with PHPUnit 4.x - 9.0.
 *
 * As this trait is empty, calls to `prophesize()` will automatically fall through
 * to PHPUnit itself and will use the PHPUnit native `prophesize()` method.
 *
 * {@internal The code in this file must be PHP cross-version compatible for PHP 5.4 - current!}
 *
 * @mixin TestCase
 */
trait ProphecyTrait
{
}
