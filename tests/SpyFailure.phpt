--TEST--
A test with a spy fails due to expected call not made 
--FILE--
<?php

require_once dirname(__DIR__) . '/xdebug_filter.php'; 
require dirname(__DIR__) . '/vendor/autoload.php';

(new \PHPUnit\TextUI\Command())->run(['phpunit', 'fixtures/SpyFailure.php'], false);
--EXPECTF--
PHPUnit %s

F %s 1 / 1 (100%)

Time: %a

There was 1 failure:

1) Prophecy\PhpUnit\Tests\Fixtures\SpyFailure::testMethod
No calls have been made that match:
  Double\DateTime\P1->format(exact("Y-m-d"))
but expected at least one.

FAILURES!
Tests: 1, Assertions: 1, Failures: 1.
