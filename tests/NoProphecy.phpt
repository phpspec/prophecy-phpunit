--TEST--
A test without Prophecy is executed with no additional assertions counted 
--FILE--
<?php

require_once __DIR__ . '/run_test.php';

\Prophecy\PhpUnit\Tests\runTest('NoProphecy');
--EXPECTF--
PHPUnit %s

. %s 1 / 1 (100%)

Time: %s

OK (1 test, 1 assertion)
