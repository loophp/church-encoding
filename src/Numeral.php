<?php

declare(strict_types=1);

namespace loophp\churchencoding;

use Closure;
use loophp\combinator\Combinators;

/**
 * Class Boolean.
 *
 * phpcs:disable Generic.Files.LineLength.TooLong
 */
final class Numeral
{
    public static function eight(): Closure
    {
        return self::plus()(self::one())(self::seven());
    }

    public static function exponentiation(): Closure
    {
        return Combinators::T();
    }

    public static function five(): Closure
    {
        return self::plus()(self::one())(self::four());
    }

    public static function four(): Closure
    {
        return self::plus()(self::one())(self::three());
    }

    public static function minus(): Closure
    {
        return Combinators::V()(self::pred());
    }

    public static function multiply(): Closure
    {
        return Combinators::B();
    }

    public static function nine(): Closure
    {
        return self::plus()(self::one())(self::eight());
    }

    public static function one(): Closure
    {
        return Combinators::A();
    }

    public static function plus(): Closure
    {
        return static fn (callable $a): Closure => static fn (callable $b): Closure => static fn (callable $c): Closure => Combinators::B()($a($c))($b($c));
    }

    public static function pred(): Closure
    {
        return static fn (callable $a): Closure => static fn (callable $b): Closure => static fn ($c) => $a(static fn ($d): Closure => static fn ($e) => $e($d($b)))(static fn () => $c)(Combinators::I());
    }

    public static function seven(): Closure
    {
        return self::plus()(self::one())(self::six());
    }

    public static function six(): Closure
    {
        return self::plus()(self::one())(self::five());
    }

    public static function succ(): Closure
    {
        return static fn (callable $n): Closure => static fn (callable $f): Closure => Combinators::B()($f)($n($f));
    }

    public static function three(): Closure
    {
        return self::plus()(self::one())(self::two());
    }

    public static function toInt(callable $numeral): int
    {
        return $numeral(static fn (int $n): int => $n + 1)(0);
    }

    public static function toNumeral(int $n): Closure
    {
        return 0 === $n - 1 ?
            Numeral::one() :
            Numeral::plus()(Numeral::one())(Numeral::toNumeral($n - 1));
    }

    public static function two(): Closure
    {
        return self::plus()(self::one())(self::one());
    }

    public static function zero(): Closure
    {
        return static fn (callable $s): Closure => Combinators::I();
    }
}
