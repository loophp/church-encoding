[![GitHub stars][github stars]][packagist]
[![Sponsor on GitHub][donate github]][github sponsor]

# Church Encoding

> A functional programming exercise in PHP demonstrating how data and logic can
> be represented purely using functions.

In mathematics, **Church encoding** is a means of representing data and
operators in the Lambda calculus. Church numerals are a representation of
natural numbers using Lambda notation. The method is named after [Alonzo
Church], who first encoded data in the Lambda calculus this way.

Church encoding is not intended as a practical implementation of primitive data
types. Its main purpose is to show that primitive data types are not _necessary_
to represent any computation. More information on
[Wikipedia][church encoding wikipedia].

## History

This library was created for **personal educational purposes** and made public.
It was inspired by the work of [Marcelo Camargo].

Although available via Composer and [Packagist], this library is primarily
useful for **learning and experimentation** rather than production use.

## Installation

```bash
composer require loophp/church-encoding
```

## Quick Example

```php
use Loophp\ChurchEncoding\Church;

// Church numerals
$zero = Church::zero();
$one = Church::succ($zero);
$two = Church::succ($one);

// Church booleans
$true = Church::true();
$false = Church::false();

echo $two->toInt(); // 2
```

## Documentation

### Church numerals

Imagine a programming language that doesn’t support numbers or booleans, only
**lambdas**. Could we still represent counting, addition, and multiplication?
Yes: that’s the idea behind _Church numerals_.

A Church numeral is a function with two parameters: `λf . λx . something`

- The first parameter `f` is the _successor function_.
- The second parameter `x` represents _zero_.

Examples:

- `C0 = λf . λx . x`
- `C1 = λf . λx . f x`
- `C2 = λf . λx . f (f x)`

Each numeral applies the successor function `f` as many times as its numeric
value. We can count, add, or multiply using these forms — though to “see” the
result, we must count the applications of `f` manually.

### Church booleans

Booleans can also be represented using functions:

- `true = λx . λy . x`
- `false = λx . λy . y`

These can be used to define logic operators:

- `and = λM . λN . M (N true false) false`
- `or = λM . λN . M true (N true false)`
- `not = λM . M false true`

## References

- _Types and Programming Languages_ ([TAPL][tapl])
- _Structure and Interpretation of Computer Programs_ ([SICP][sicp])
- Lectures by [Robert “Corky” Cartwright][robert corky cartwright]
- Gabriel Lebec: [Part 1][gabriel lebec p1] and [Part 2][gabriel lebec p2]
- Package [loophp/combinator][loophp/combinator]
- [Lambda calculus on Wikipedia][lambda calculus wikipedia]
- [Church encoding on Wikipedia][church encoding wikipedia]
- [Programming with Less Than Nothing](https://joshmoody.org/blog/programming-with-less-than-nothing/)

## Code Quality, Tests and Benchmarks

Every change triggers automated tests via [GitHub Actions][github actions].

- Tests are written with [PHPSpec][phpspec] (`composer phpspec`)
- Static analysis via [PHPStan][phpstan] and [Psalm][psalm]
- Mutation testing with [Infection][infection] (`composer infection`)
- Pre-commit checks with [GrumPHP][grumphp] (`composer grumphp`)

## Contributing

Contributions are welcome! Send a pull request on GitHub.

If you prefer to support my open-source work financially, you can sponsor me on
[GitHub][github sponsor] or [PayPal][paypal sponsor].

## Project Status

This project is **feature-complete** and stable. It is maintained for
educational purposes and may receive occasional compatibility updates.

## Changelog

See [CHANGELOG.md][changelog-md] for the commit-based changelog. For detailed
release notes, visit [the release page][changelog-releases].

[Alonzo Church]: https://en.wikipedia.org/wiki/Alonzo_Church
[Marcelo Camargo]: https://github.com/haskellcamargo
[latest stable version]:
  https://img.shields.io/packagist/v/loophp/church-encoding.svg?style=flat-square
[Packagist]: https://packagist.org/packages/loophp/church-encoding
[github stars]:
  https://img.shields.io/github/stars/loophp/church-encoding.svg?style=flat-square
[total downloads]:
  https://img.shields.io/packagist/dt/loophp/church-encoding.svg?style=flat-square
[github workflow status]:
  https://img.shields.io/github/actions/workflow/status/loophp/church-encoding/continuous-integration.yml?style=flat-square
[github actions]: https://github.com/loophp/church-encoding/actions
[code coverage]:
  https://img.shields.io/scrutinizer/coverage/g/loophp/church-encoding/master.svg?style=flat-square
[code quality link]:
  https://scrutinizer-ci.com/g/loophp/church-encoding/?branch=master
[type coverage]: https://shepherd.dev/github/loophp/church-encoding/coverage.svg
[sheperd type coverage]: https://shepherd.dev/github/loophp/church-encoding
[license]:
  https://img.shields.io/packagist/l/loophp/church-encoding.svg?style=flat-square
[donate github]:
  https://img.shields.io/badge/Sponsor-GitHub-brightgreen.svg?style=flat-square
[github sponsor]: https://github.com/sponsors/drupol
[donate paypal]:
  https://img.shields.io/badge/Sponsor-PayPal-brightgreen.svg?style=flat-square
[paypal sponsor]: https://www.paypal.me/drupol
[church encoding wikipedia]: https://en.wikipedia.org/wiki/Church_encoding
[phpspec]: http://www.phpspec.net/
[grumphp]: https://github.com/phpro/grumphp
[infection]: https://github.com/infection/infection
[phpstan]: https://github.com/phpstan/phpstan
[psalm]: https://github.com/vimeo/psalm
[changelog-md]:
  https://github.com/loophp/church-encoding/blob/master/CHANGELOG.md
[changelog-releases]: https://github.com/loophp/church-encoding/releases
[gabriel lebec p1]: https://www.youtube.com/watch?v=3VQ382QG-y4
[gabriel lebec p2]: https://www.youtube.com/watch?v=pAnLQ9jwN-E
[robert corky cartwright]: https://www.cs.rice.edu/~cork/
[tapl]: https://www.cis.upenn.edu/~bcpierce/tapl/
[sicp]:
  https://en.wikipedia.org/wiki/Structure_and_Interpretation_of_Computer_Programs
[loophp/combinator]: https://github.com/loophp/combinator
[lambda calculus wikipedia]: https://en.wikipedia.org/wiki/Lambda_calculus
