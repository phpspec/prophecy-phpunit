--TEST--
A test with a mock is executed successfully 
--FILE--
<?php

require_once __DIR__ . '/run_test.php';

\Prophecy\PhpUnit\Tests\runTest('Success');
--EXPECTF--
PHPUnit %s

. %s 1 / 1 (100%)

Time: %s

OK (1 test, 1 assertion)
