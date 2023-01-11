--TEST--
A test with a mock is executed successfully 
--FILE--
<?php

require dirname(__DIR__) . '/vendor/autoload.php';

(new PHPUnit\TextUI\Application())->run(['phpunit', 'fixtures/Success.php', '--no-progress'], false);
--EXPECTF--
PHPUnit 10.%s

Runtime:       PHP 8.%s
Configuration: %s

Time: %s

OK (1 test, 1 assertion)
