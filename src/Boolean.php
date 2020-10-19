<?php

declare(strict_types=1);

namespace loophp\churchencoding;

use Closure;

/**
 * Class Boolean.
 *
 * phpcs:disable Generic.Files.LineLength.TooLong
 */
final class Boolean
{
    public static function booleanToPrimitive(): Closure
    {
        return static fn (callable $l): Closure => static fn (bool $m): Closure => static fn (bool $n): bool => $l($m)($n);
    }

    public static function CAnd(): Closure
    {
        return static fn (callable $l): Closure => static fn (callable $c): Closure => $l($c)(self::CFalse());
    }

    public static function CFalse(): Closure
    {
        return static fn ($t): Closure => static fn ($f) => $f;
    }

    public static function CIf(): Closure
    {
        return static fn (callable $if): Closure => self::CTrue()($if)(self::CFalse());
    }

    public static function CNot(): Closure
    {
        return static fn (callable $fn): Closure => $fn(self::CFalse())(self::CTrue());
    }

    public static function COr(): Closure
    {
        return static fn (callable $l): Closure => static fn (callable $c): Closure => $l(self::CTrue())($c);
    }

    public static function CTrue(): Closure
    {
        return static fn ($t): Closure => static fn ($f) => $t;
    }

    public static function CXor(): Closure
    {
        return static fn (callable $a): Closure => static fn (callable $b) => ($a($b(self::CFalse())(self::CTrue())))($b(self::CTrue())(self::CFalse()));
    }
}
