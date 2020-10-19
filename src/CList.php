<?php

declare(strict_types=1);

namespace loophp\churchencoding;

use Closure;
use loophp\combinator\Combinators;

/**
 * Class CList.
 *
 * phpcs:disable Generic.Files.LineLength.TooLong
 */
final class CList
{
    public static function concat(): Closure
    {
        return static fn (callable $xs): Closure => static fn (callable $ys): Closure => self::foldr()(self::cons())($ys)($xs);
    }

    public static function cons()
    {
        return static fn (callable $a): Closure => static fn (callable $b): Closure => Pair::of()(Boolean::CFalse())(Pair::of()($a)($b));
    }

    public static function foldl()
    {
        return static fn (callable $f): Closure => static fn ($a): Closure => static fn (callable $xs) => self::foldr()(
            static fn (callable $x): Closure => static fn (callable $g): Closure => static fn ($y) => $g($f($y)($x))
        )(static fn ($x) => $x)($xs)($a);
    }

    public static function foldr()
    {
        return Combinators::Y()(
            static fn (callable $r): Closure => static fn (callable $f): Closure => static fn ($a): Closure => static fn (callable $xs) => Boolean::CIf()(self::isNil()($xs))(static fn () => $a)(static fn () => $f(self::head()($xs))($r($f)($a)(self::tail()($xs))))()
        );
    }

    public static function head()
    {
        return static fn (callable $a): Closure => Pair::first()(Pair::second()($a));
    }

    public static function isNil()
    {
        return Pair::first();
    }

    public static function length()
    {
        return self::foldl()(static fn (callable $a): Closure => static fn (callable $b): Closure => Numeral::succ()($a))(Numeral::zero());
    }

    public static function nil()
    {
        return Pair::of()(Boolean::CTrue())(Boolean::CTrue());
    }

    public static function range()
    {
        return static fn (callable $a): Closure => static fn (callable $b): Closure => Numeral::minus()(Numeral::succ()($b))($a)(static fn (callable $c): Closure => CList::cons()(Numeral::minus()($b)(CList::length()($c)))($c))(CList::nil());
    }

    public static function repeat()
    {
        return static fn (callable $a): Closure => static fn (callable $b): Closure => $b(
            static fn ($c): Closure => CList::cons()($a)($c)
        )(CList::nil());
    }

    public static function sum()
    {
        return self::foldl()(Numeral::plus())(Numeral::zero());
    }

    public static function tail(): Closure
    {
        return static fn (callable $a): Closure => Pair::second()(Pair::second()($a));
    }
}
