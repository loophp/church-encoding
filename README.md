[![Latest Stable Version][latest stable version]][packagist]
 [![GitHub stars][github stars]][packagist]
 [![Total Downloads][total downloads]][packagist]
 [![GitHub Workflow Status][github workflow status]][github actions]
 [![Scrutinizer code quality][code quality]][code quality link]
 [![Type Coverage][type coverage]][sheperd type coverage]
 [![Code Coverage][code coverage]][code quality link]
 [![License][license]][packagist]
 [![Donate!][donate github]][github sponsor]
 [![Donate!][donate paypal]][paypal sponsor]

# Church Encoding

In mathematics, **Church encoding** is a means of representing data and operators in the Lambda calculus. The Church numerals are a representation of the natural numbers using lambda notation. The method is named for [Alonzo Church][Alonzo Church], who first encoded data in the lambda calculus this way.

The Church encoding is not intended as a practical implementation of primitive data types. Its use is to show that other primitive data types are not required to represent any calculation. The completeness is representational...more on [Wikipedia][church encoding wikipedia].

This library has been done for personal educational purpose and made public, it has been inspired by the work of [Marcelo Camargo][Marcelo Camargo].

## Done

- Booleans
  - [x] true
  - [x] false
  - [x] and
  - [x] or
  - [x] not
  - [x] xor
  - [x] eq
  - [x] lt 
  - [x] lte
  - [x] gt
  - [x] gte
  - [x] isZero
- Numerals
  - [x] succ
  - [x] pred
  - [x] 0
  - [x] 1
  - [x] 2
  - [x] 3
  - [x] 4
  - [x] 5
  - [x] 6
  - [x] 7
  - [x] 8
  - [x] 9
  - [x] +
  - [x] -
  - [x] ×
  - [ ] ÷
- Pairs
  - [x] first
  - [x] second
- CList
  - [x] concat
  - [x] cons
  - [x] foldl
  - [x] foldr
  - [x] head
  - [x] isNil
  - [x] length
  - [x] nil
  - [x] range
  - [x] repeat
  - [x] sum
  - [x] tail

## Code quality, tests and benchmarks

Every time changes are introduced into the library, [Github][github actions] run the
tests.

The library has tests written with [PHPSpec][phpspec].
Feel free to check them out in the `spec` directory. Run `composer phpspec` to trigger the tests.

Before each commit some inspections are executed with [GrumPHP][grumphp],
run `composer grumphp` to check manually.

The quality of the tests is tested with [Infection][infection] a PHP Mutation testing
framework,  run `composer infection` to try it.

Static analysers are also controlling the code. [PHPStan][phpstan] and
[PSalm][psalm] are enabled to their maximum level.

## Contributing

Feel free to contribute by sending Github pull requests. I'm quite reactive :-)

If you can't contribute to the code, you can also sponsor me on [Github][github sponsor] or [Paypal][paypal sponsor].

## Changelog

See [CHANGELOG.md][changelog-md] for a changelog based on [git commits][git-commits].

For more detailed changelogs, please check [the release changelogs][changelog-releases].

[Alonzo Church]: https://en.wikipedia.org/wiki/Alonzo_Church
[Marcelo Camargo]: https://github.com/haskellcamargo

[latest stable version]: https://img.shields.io/packagist/v/loophp/church-encoding.svg?style=flat-square
[packagist]: https://packagist.org/packages/loophp/church-encoding

[github stars]: https://img.shields.io/github/stars/loophp/church-encoding.svg?style=flat-square

[total downloads]: https://img.shields.io/packagist/dt/loophp/church-encoding.svg?style=flat-square

[github workflow status]: https://img.shields.io/github/workflow/status/loophp/church-encoding/Continuous%20Integration?style=flat-square
[github actions]: https://github.com/loophp/church-encoding/actions

[code quality]: https://img.shields.io/scrutinizer/quality/g/loophp/church-encoding/master.svg?style=flat-square
[code quality link]: https://scrutinizer-ci.com/g/loophp/church-encoding/?branch=master

[type coverage]: https://shepherd.dev/github/loophp/church-encoding/coverage.svg
[sheperd type coverage]: https://shepherd.dev/github/loophp/church-encoding

[code coverage]: https://img.shields.io/scrutinizer/coverage/g/loophp/church-encoding/master.svg?style=flat-square
[code quality link]: https://img.shields.io/scrutinizer/quality/g/loophp/church-encoding/master.svg?style=flat-square

[license]: https://img.shields.io/packagist/l/loophp/church-encoding.svg?style=flat-square

[donate github]: https://img.shields.io/badge/Sponsor-Github-brightgreen.svg?style=flat-square
[github sponsor]: https://github.com/sponsors/drupol

[donate paypal]: https://img.shields.io/badge/Sponsor-Paypal-brightgreen.svg?style=flat-square
[paypal sponsor]: https://www.paypal.me/drupol

[church encoding wikipedia]: https://en.wikipedia.org/wiki/Church_encoding

[phpspec]: http://www.phpspec.net/
[grumphp]: https://github.com/phpro/grumphp
[infection]: https://github.com/infection/infection
[phpstan]: https://github.com/phpstan/phpstan
[psalm]: https://github.com/vimeo/psalm
[changelog-md]: https://github.com/loophp/church-encoding/blob/master/CHANGELOG.md
[git-commits]: https://github.com/loophp/church-encoding/commits/master
[changelog-releases]: https://github.com/loophp/church-encoding/releases

