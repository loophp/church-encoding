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

In mathematics, **Church encoding** is a means of representing data and operators in the Lambda calculus. The Church numerals are a representation of the natural numbers using Lambda notation. The method is named for [Alonzo Church][Alonzo Church], who first encoded data in the Lambda calculus this way.

The Church encoding is not intended as a practical implementation of primitive data types. Its use is to show that other primitive data types are not required to represent any calculation. The completeness is representational...more on [Wikipedia][church encoding wikipedia].

## History

This library has been done for personal educational purpose and made public, it has been inspired by the work of [Marcelo Camargo][Marcelo Camargo].
The code is available through Composer(via [Packagist][packagist]) just in case, but I doubt this will be useful for anyone beside learning purposes.

## Usage

`composer require loophp/church-encoding`

## Documentation

### Church numerals

Assume we have a programming language that doesn’t support numbers or booleans: a **Lambda** is the only value it provides. It is an interesting question whether we can nonetheless create some system that allows us to count, add, multiply, and do all the other things we do with numbers.

Church numerals use Lambdas to create a representation of numbers.

The idea is closely related to the functional representation of natural numbers, i.e. to have a natural number representing `zero` and a function `succ` that returns the successor of the natural number it was given. The choice of `zero` and `succ` is arbitrary, all that matters is that there is a `zero` and that there is a function that can provide the successor. Church numerals are an extension of this.

All Church numerals are functions with two parameters: `λf . λx . something`

The first parameter `f` is the successor function that should be used. The second parameter `x` is the value that represents zero.

Therefore, the Church numeral for zero is: `C0=λf . λx . x`

Whenever it is applied, it returns the value representing zero. The Church numeral for one applies the successor function to the value representing zero exactly once: `C1=λf . λx . f x`.

The Church numerals that follow just have additional applications of the successor function

It is important to note that in this minimal Lambda calculus, we can’t really do very much with these Church numerals. We can count and add and multiply, but to understandthe result, we have to count the applications of the successor function.

### Church booleans

We can ask the same question we asked about numbers about booleans. Can we represent them using just functions?
**Yes we can**, and in a way very similar to Church numerals.
A Church boolean is a function with two parameters, the first represents what the function should return if it is `true`,
the second what the function should return if it is `false`:

* `true = λx . λy . x`
* `false = λx . λy . y`

Just like with Church numerals, we can also perform arithmetic with Church booleans.

It is easy to define functions for `and`, `or`, and `not`

* `and` = `λM . λN . M (N true false) false`
* `or` = `λM . λN . M true (N true false)`
* `not` = `λM . M false true`

### References

* Types And Programming Languages ([TAPL][tapl])
* Structure and Interpretation of Computer Programs ([SICP][sicp])
* Lectures of [Robert ”Corky” Cartwright][robert corky cartwright]
* Gabriel Lebec: [Part 1][gabriel lebec p1] and [Part 2][gabriel lebec p2]
* Package [loophp/combinator][loophp/combinator]
* [Lambda calculus on Wikipedia][lambda calculus wikipedia]
* [Church encoding on Wikipedia][church encoding wikipedia]

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

[gabriel lebec p1]: https://www.youtube.com/watch?v=3VQ382QG-y4
[gabriel lebec p2]: https://www.youtube.com/watch?v=pAnLQ9jwN-E
[robert corky cartwright]: https://www.cs.rice.edu/~cork/
[tapl]: https://www.cis.upenn.edu/~bcpierce/tapl/
[sicp]: https://en.wikipedia.org/wiki/Structure_and_Interpretation_of_Computer_Programs
[loophp/combinator]: https://github.com/loophp/combinator
[lambda calculus wikipedia]: https://en.wikipedia.org/wiki/Lambda_calculus
