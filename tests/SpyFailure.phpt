--TEST--
A test with a spy fails due to expected call not made 
--FILE--
<?php

require_once dirname(__DIR__) . '/xdebug_filter.php'; 
require dirname(__DIR__) . '/vendor/autoload.php';

(new PHPUnit\TextUI\Application())->run(['phpunit', 'fixtures/SpyFailure.php', '--no-progress'], false);
--EXPECTF--
PHPUnit 10.%s

Runtime:       PHP 8.%s
Configuration: %s

Time: %s

There was 1 error:

1) Prophecy\PhpUnit\Tests\Fixtures\SpyFailure::testMethod
Prophecy\Exception\Prediction\NoCallsException: No calls have been made that match:
  Double\DateTime\P1->format(exact("Y-m-d"))
but expected at least one.

%a%s/fixtures/SpyFailure.php:%d

ERRORS!
Tests: 1, Assertions: 1, Errors: 1.
