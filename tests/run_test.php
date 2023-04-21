<?php

namespace Prophecy\PhpUnit\Tests;

use PHPUnit\TextUI\Application;
use PHPUnit\TextUI\Command;

require_once __DIR__ . '/xdebug_filter.php';
require_once dirname(__DIR__) . '/vendor/autoload.php';

function runTest(string $fixtureName): void
{
    $filename = dirname(__DIR__) . '/fixtures/' . $fixtureName . '.php';
    if (!file_exists($filename)) {
        throw new \InvalidArgumentException('Unable to find test fixture at path ' . $filename);
    }

    if (class_exists(Command::class)) {
        // PHPUnit 9.x
        (new Command())->run(['phpunit', $filename, '--verbose', '--no-configuration'], false);
    } else {
        // PHPUnit 10.x
        (new Application())->run(['phpunit', $filename, '--no-configuration']);
    }
}
