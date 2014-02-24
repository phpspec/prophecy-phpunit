# Prophecy

[![Build Status](https://travis-ci.org/phpspec/prophecy-phpunit.png?branch=master)](https://travis-ci.org/phpspec/prophecy-phpunit)

Prophecy PHPUnit integrates the [Prophecy](https://github.com/phpspec/prophecy) mocking
library with [PHPUnit](http://phpunit.de) to provide an easier mocking in your testsuite.


## Usage

```php
<?php

use Prophecy\PHPUnit\ProphecyTestCase;

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

Prophecy PHPUnit requires PHP 5.3.3 or greater.

### Setup through composer

First, add Prophecy to the list of dependencies inside your `composer.json`:

```json
{
    "require-dev": {
        "phpspec/prophecy-phpunit": "~1.0"
    }
}
```

Then simply install it with composer:

```bash
$> composer install --prefer-dist
```

You can read more about Composer on its [official webpage](http://getcomposer.org).

## How to use it

The special ``ProphecyTestCase`` exposes a method ``prophesize($classOrInterface = null)``
to use Prophecy.
For the usage of the Prophecy doubles, please refer to the [Prophecy documentation](https://github.com/phpspec/prophecy).

If you want to add some logic in the ``setUp`` and ``tearDown`` methods of your testcase,
don't forget to call the parent methods to keep the initialization and prediction checking
of Prophecy.
