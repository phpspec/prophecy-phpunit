--TEST--
A test with a mock is executed successfully 
--FILE--
<?php

require_once dirname(__DIR__) . '/xdebug_filter.php'; 
require dirname(__DIR__) . '/vendor/autoload.php';

(new \PHPUnit\TextUI\Command())->run(['phpunit', 'fixtures/Success.php'], false);
--EXPECTF--
PHPUnit %s

. %s 1 / 1 (100%)

Time: %s

OK (1 test, 1 assertion)
