--TEST--
A test without Prophecy is executed with no additional assertions counted 
--FILE--
<?php

require_once dirname(__DIR__) . '/xdebug_filter.php'; 
require dirname(__DIR__) . '/vendor/autoload.php';

(new \PHPUnit\TextUI\Command())->run(['phpunit', 'fixtures/NoProphecy.php'], false);
--EXPECTF--
PHPUnit %s

. %s 1 / 1 (100%)

Time: %s

OK (1 test, 1 assertion)
