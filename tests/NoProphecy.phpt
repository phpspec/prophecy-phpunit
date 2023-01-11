--TEST--
A test without Prophecy is executed with no additional assertions counted 
--FILE--
<?php

require_once dirname(__DIR__) . '/xdebug_filter.php'; 
require dirname(__DIR__) . '/vendor/autoload.php';

(new PHPUnit\TextUI\Application())->run(['phpunit', 'fixtures/NoProphecy.php', '--no-progress'], false);
--EXPECTF--
PHPUnit 10.%s

Runtime:       PHP 8.%s
Configuration: %s

Time: %s

OK (1 test, 1 assertion)
