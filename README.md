# Prophecy

[![Build Status](https://travis-ci.org/phpspec/prophecy-phpunit.png?branch=master)](https://travis-ci.org/phpspec/prophecy-phpunit)

Prophecy PhpUnit integrates the [Prophecy](https://github.com/phpspec/prophecy) mocking
library with [PHPUnit](https://phpunit.de) to provide an easier mocking in your testsuite.

## Usage

```php
<?php

use Prophecy\PhpUnit\ProphecyTestCase;

class UserTest extends ProphecyTestCase
{
    public function testPasswordHashing()
    {
        $hasher = $this->prophesize('App\Security\Hasher');
        $user   = new App\Entity\User($hasher->reveal());

        $hasher->generateHash($user, 'qwerty')->willReturn('hashed_pass');

        $user->setPassword('qwerty');

        $this->assertEquals('hashed_pass', $user->getPassword());
    }
}
```

## Installation

### Prerequisites

Prophecy PhpUnit requires PHP 7.3 or greater.
Prophecy PhpUnit requires PHPUnit 9.1 or greater. Older versions of PHPUnit are providing the Prophecy integration themselves.

### Setup through composer

```bash
$> composer require --dev phpspec/prophecy-phpunit
```

You can read more about Composer on its [official webpage](https://getcomposer.org).

## How to use it

The special ``ProphecyTestCase`` exposes a method ``prophesize($classOrInterface = null)``
to use Prophecy.
For the usage of the Prophecy doubles, please refer to the [Prophecy documentation](https://github.com/phpspec/prophecy).

