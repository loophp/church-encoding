<?php

declare(strict_types=1);

namespace loophp\churchencoding;

use Closure;

/**
 * Class Boolean.
 *
 * phpcs:disable Generic.Files.LineLength.TooLong
 */
final class Numeral
{
    /**
     * λs.λz. s (s (s (s (s (s (s (s (s z)))))))).
     */
    public static function eight(): Closure
    {
        return static fn (callable $s) => static fn ($z) => $s($s($s($s($s($s($s($s($z))))))));
    }

    public static function exponentiation(): Closure
    {
        return static fn (callable $f): Closure => static fn (callable $n): Closure => $n($f);
    }

    /**
     * λs.λz. s (s (s (s (s (s z))))).
     */
    public static function five(): Closure
    {
        return static fn (callable $s): Closure => static fn ($z) => $s($s($s($s($s($z)))));
    }

    /**
     * λs.λz. s (s (s (s (s z)))).
     */
    public static function four(): Closure
    {
        return static fn (callable $s): Closure => static fn ($z) => $s($s($s($s($z))));
    }

    public static function minus(): Closure
    {
        return static fn (callable $x): Closure => static fn (callable $y): Closure => $y(self::pred())($x);
    }

    public static function multiply(): Closure
    {
        return static fn (callable $x): Closure => static fn (callable $y): Closure => $x(self::plus()($y))(self::zero());
    }

    /**
     * λs.λz. s (s (s (s (s (s (s (s (s (s z))))))))).
     */
    public static function nine(): Closure
    {
        return static fn (callable $s): Closure => static fn ($z) => $s($s($s($s($s($s($s($s($s($z)))))))));
    }

    /**
     * λs.λz. s (s z).
     */
    public static function one(): Closure
    {
        return static fn (callable $s): Closure => static fn ($z) => $s($z);
    }

    public static function plus(): Closure
    {
        return static fn (callable $x): Closure => static fn (callable $y): Closure => static fn ($s): Closure => static fn ($z) => $x($s)($y($s)($z));
    }

    public static function pred(): Closure
    {
        return static fn (callable $n): Closure => static fn (callable $next): Closure => static fn ($first) => Pair::second()(
            $n(
                static fn (callable $pair): Closure => Pair::first()($pair) ?
                                        Pair::of()(false)($first) :
                                        Pair::of()(false)($next(Pair::second()($pair)))
            )(Pair::of()(true)($first))
        );
    }

    /**
     * λs.λz. s (s (s (s (s (s (s (s z))))))).
     */
    public static function seven(): Closure
    {
        return static fn (callable $s) => static fn ($z) => $s($s($s($s($s($s($s($z)))))));
    }

    /**
     * λs.λz. s (s (s (s (s (s (s z)))))).
     */
    public static function six(): Closure
    {
        return static fn (callable $s) => static fn ($z) => $s($s($s($s($s($s($z))))));
    }

    public static function succ(): Closure
    {
        return static fn (callable $n): Closure => static fn (callable $s): Closure => static fn ($z) => $s($n($s)($z));
    }

    /**
     * λs.λz. s (s (s (s z))).
     */
    public static function three(): Closure
    {
        return static fn (callable $s) => static fn ($z) => $s($s($s($z)));
    }

    /**
     * λs.λz. s (s (s z)).
     */
    public static function two(): Closure
    {
        return static fn (callable $s) => static fn ($z) => $s($s($z));
    }

    /**
     * λs.λz. z.
     */
    public static function zero(): Closure
    {
        return static fn (callable $s) => static fn ($z) => $z;
    }
}
