# 2.3.0

* Add more precise type for the `prophesize` method

# 2.2.0

* Add support for PHPUnit 11

# 2.1.0 / 2023-12-08

Add support for PHPUnit 10.1+ (10.0 is not supported)
Bump requirement to Prophecy 1.18+

# 2.0.2 / 2023-04-18

Add the `@not-deprecated` annotation to avoid phpstan reporting `prophesize` as deprecated due to the TestCase deprecation.

# 2.0.1 / 2020-07-09

Add support for PHP 8

# 2.0.0 / 2020-04-07

Rewrite of the library for PHPUnit 9.1+, with a new API based on a trait rather than a base class.

1.1.0 / 2015-02-09
==================

* Remove the requirement to call the parent ``setUp`` method
* Add the assertion count for predictions to be compatible with PHPUnit strict mode

1.0.1 / 2014-03-04
==================

* Marked the ``ProphecyTestCase`` as abstract to avoid PhpUnit to try running it

1.0.0 / 2013-07-04
==================

* Initial release
