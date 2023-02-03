--TEST--
A test with a Prophecy called without any argument 
--FILE--
<?php

require_once __DIR__ . '/run_test.php';

\Prophecy\PhpUnit\Tests\runTest('NoClass');
--EXPECTF--
PHPUnit %s

Runtime: %s

. %s 1 / 1 (100%)

Time: %s

OK (1 test, 1 assertion)
