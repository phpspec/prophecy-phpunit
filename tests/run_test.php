<?php

namespace Prophecy\PhpUnit\Tests;

use PHPUnit\TextUI\Command;

require_once __DIR__ . '/xdebug_filter.php';
require_once dirname(__DIR__) . '/vendor/autoload.php';

function runTest(string $fixtureName): void
{
    $filename = dirname(__DIR__) . '/fixtures/' . $fixtureName . '.php';
    if (!file_exists($filename)) {
        throw new \InvalidArgumentException('Unable to find test fixture at path ' . $filename);
    }

    (new Command())->run(['phpunit', $filename], false);
}
