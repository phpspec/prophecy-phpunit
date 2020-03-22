# phpspec/prophecy-phpunit

This component integrated `phpspec/prophecy-phpunit` with `phpunit/phpunit`.

Starting with version 4.5 (released in February 2015), [PHPUnit](https://phpunit.de/) bundled [phpspec/prophecy](https://github.com/phpspec/prophecy) as an alternative to its own test double functionality. Starting with PHPUnit 9.1 (released in April 2020), this bundled integration of Prophecy is deprecated. It will removed in PHPUnit (released in February 2021).

## Installation

You can add this library as a local, per-project dependency to your project using [Composer](https://getcomposer.org/):

```
composer require phpspec/prophecy-phpunit
```

If you only need this library during development, for instance to run your project's test suite, then you should add it as a development-time dependency:

```
composer require --dev phpspec/prophecy-phpunit
```
