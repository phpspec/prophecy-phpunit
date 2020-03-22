# ChangeLog

All notable changes are documented in this file using the [Keep a CHANGELOG](https://keepachangelog.com/) principles.

## [2.0.0] - 2020-04-03

### Changed

* Updated to work with PHPUnit 9.1 (because PHPUnit's bundled Prophecy support is deprecated and will be removed in PHPUnit 10)

## [1.1.0] - 2015-02-09

### Added

* Add the assertion count for predictions to be compatible with PHPUnit strict mode

### Changed

* Remove the requirement to call the parent ``setUp`` method

## [1.0.1] - 2014-03-04

### Changed

* Marked the ``ProphecyTestCase`` as abstract to avoid PhpUnit to try running it

## [1.0.0] - 2013-07-04

* Initial release

[2.0.0]: https://github.com/phpspec/prophecy-phpunit/compare/1.1.0...master
[1.1.0]: https://github.com/phpspec/prophecy-phpunit/compare/1.0.1...1.1.0
[1.0.1]: https://github.com/phpspec/prophecy-phpunit/compare/1.0.0...1.0.1
[1.0.0]: https://github.com/phpspec/prophecy-phpunit/compare/1e09128be9798367ce3df102090221f721546419...master
