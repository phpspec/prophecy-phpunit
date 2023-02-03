--TEST--
A test with a spy fails due to expected call not made 
--FILE--
<?php

require_once __DIR__ . '/run_test.php';

\Prophecy\PhpUnit\Tests\runTest('SpyFailure');
--EXPECTF--
PHPUnit %s

Runtime: %s

F %s 1 / 1 (100%)

Time: %a

There was 1 failure:

1) Prophecy\PhpUnit\Tests\Fixtures\SpyFailure::testMethod
%ao calls have been made that match:
  Double\DateTime\P1->format(exact("Y-m-d"))
but expected at least one.

%a/tests/run_test.php:%d

FAILURES!
Tests: 1, Assertions: 1, Failures: 1.
