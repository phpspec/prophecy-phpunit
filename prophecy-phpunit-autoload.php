<?php

namespace Prophecy\PhpUnit;

use PHPUnit\Runner\Version as PHPUnit_Version;
use PHPUnit_Runner_Version;

if (\class_exists('Prophecy\PhpUnit\Autoload', false) === false) {

    /**
     * Custom autoloader.
     *
     * {@internal The code in this file must be PHP cross-version compatible for PHP 5.4 - current!}
     */
    class Autoload
    {
        /**
         * Loads a class.
         *
         * @param string $className The name of the class to load.
         *
         * @return bool
         */
        public static function load($className)
        {
            if ($className === 'Prophecy\PhpUnit\ProphecyTrait') {
                if (\version_compare(self::getPHPUnitVersion(), '9.1.0', '>=')) {
                    // PHPUnit >= 9.1.0.
                    require_once __DIR__ . '/src/ProphecyTrait.php';
                    return true;
                }

                // PHPUnit < 9.1.0.
                require_once __DIR__ . '/src/ProphecyTraitEmpty.php';
                return true;
            }

            return false;
        }

        /**
         * Retrieve the PHPUnit version id.
         *
         * As both the pre-PHPUnit 6 class, as well as the PHPUnit 6+ class contain the `id()` function,
         * this should work independently of whether or not another library may have aliased the class.
         *
         * @return string Version number as a string.
         */
        public static function getPHPUnitVersion()
        {
            if (\class_exists('\PHPUnit\Runner\Version')) {
                return PHPUnit_Version::id();
            }

            if (\class_exists('\PHPUnit_Runner_Version')) {
                return PHPUnit_Runner_Version::id();
            }

            return '0';
        }
    }

    \spl_autoload_register(__NAMESPACE__ . '\Autoload::load');
}
