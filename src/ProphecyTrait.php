<?php

namespace Prophecy\PhpUnit;

use PHPUnit\Runner\Version;
use PHPUnit_Runner_Version;

/**
 * Load the prophecy trait.
 *
 * {@internal The code in this file must be PHP cross-version compatible for PHP 5.4 - current!}
 */

/**
 * Retrieve the PHPUnit version id.
 *
 * As both the pre-PHPUnit 6 class, as well as the PHPUnit 6+ class contain the `id()` function,
 * this should work independently of whether or not another library may have aliased the class.
 *
 * @return string Version number as a string.
 */
function getPHPUnitVersion()
{
    if (\class_exists('\PHPUnit\Runner\Version')) {
        return Version::id();
    }

    if (\class_exists('\PHPUnit_Runner_Version')) {
        return PHPUnit_Runner_Version::id();
    }

    return '0';
}


if (\version_compare(namespace\getPHPUnitVersion(), '9.1.0', '>=')) {
    // PHPUnit >= 9.1.0.
    require_once __DIR__ . '/ProphecyTrait.actual.php';
} else {
    require_once __DIR__ . '/ProphecyTrait.empty.php';
}
