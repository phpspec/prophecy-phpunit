# Prophecy

[![Build Status](https://github.com/phpspec/prophecy-phpunit/actions/workflows/ci.yml/badge.svg)](https://github.com/phpspec/prophecy-phpunit/actions/workflows/ci.yml)

Prophecy PhpUnit integrates the [Prophecy](https://github.com/phpspec/prophecy) mocking
library with [PHPUnit](https://phpunit.de) to provide an easier mocking in your testsuite.

## Installation

### Prerequisites

Prophecy PhpUnit requires PHP 7.3 or greater.
Prophecy PhpUnit requires PHPUnit 9.1 or greater. Older versions of PHPUnit are providing the Prophecy integration themselves.

### Setup through composer

```bash
composer require --dev phpspec/prophecy-phpunit
```

You can read more about Composer on its [official webpage](https://getcomposer.org).

> :bulb: The package can be safely required and used on PHP 5.4 to current in combination with PHPUnit 4.8.36/5.7.21 to current.
>
> When the PHPUnit `prophesize()` method is natively available and not deprecated (PHPUnit 4.8 - 9.0), the PHPUnit
> native functionality will be used.
> For PHPUnit 9.1 and higher, the extension will kick in and polyfill the functionality which was deprecated in PHPUnit.


## How to use it

The trait ``ProphecyTrait`` provides a method ``prophesize($classOrInterface = null)`` to use Prophecy.
For the usage of the Prophecy doubles, please refer to the [Prophecy documentation](https://github.com/phpspec/prophecy).

Below is a usage example:

```php
<?php

namespace App;

use PHPUnit\Framework\TestCase;
use Prophecy\PhpUnit\ProphecyTrait;
use App\Security\Hasher;
use App\Entity\User;

class UserTest extends TestCase
{
    use ProphecyTrait;

    public function testPasswordHashing()
    {
        $hasher = $this->prophesize(Hasher::class);
        $user   = new User($hasher->reveal());

        $hasher->generateHash($user, 'qwerty')->willReturn('hashed_pass');

        $user->setPassword('qwerty');

        $this->assertEquals('hashed_pass', $user->getPassword());
    }
}
```
