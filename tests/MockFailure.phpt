--TEST--
A test with a mock fails due to a missing expected call 
--FILE--
<?php

require_once dirname(__DIR__) . '/xdebug_filter.php'; 
require dirname(__DIR__) . '/vendor/autoload.php';

(new \PHPUnit\TextUI\Command())->run(['phpunit', 'fixtures/MockFailure.php'], false);
--EXPECTF--
PHPUnit %s

F %s 1 / 1 (100%)

Time: %s

There was 1 failure:

1) Prophecy\PhpUnit\Tests\Fixtures\MockFailure::testMethod
Some predictions failed:
Double\DateTime\P1:
  Expected exactly 2 calls that match:
      Double\DateTime\P1->format(exact("Y-m-d"))
    but 1 were made:
      - format("Y-m-d") @ fixtures/MockFailure.php:%d

%s/src/ProphecyTrait.php:%d

FAILURES!
Tests: 1, Assertions: 1, Failures: 1.
