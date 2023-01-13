--TEST--
A test with a mock fails due to a missing expected call 
--FILE--
<?php

require_once __DIR__ . '/run_test.php';

\Prophecy\PhpUnit\Tests\runTest('MockFailure');
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
%s/tests/run_test.php:%d

FAILURES!
Tests: 1, Assertions: 1, Failures: 1.
