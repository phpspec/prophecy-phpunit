--TEST--
A test fails due to calling an unexisting method on a mock 
--FILE--
<?php

require_once __DIR__ . '/run_test.php';

\Prophecy\PhpUnit\Tests\runTest('WrongCall');
--EXPECTF--
PHPUnit %s

Runtime: %s

E %s 1 / 1 (100%)

Time: %a

There was 1 error:

1) Prophecy\PhpUnit\Tests\Fixtures\WrongCall::testMethod
Prophecy\Exception\Doubler\MethodNotFoundException: Method `Double\stdClass\P1::talk()` is not defined.

%a%s/fixtures/WrongCall.php:%d
%s/tests/run_test.php:%d

ERRORS!
Tests: 1, Assertions: 0, Errors: 1.
