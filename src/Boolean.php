<?php

/**
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

declare(strict_types=1);

namespace loophp\churchencoding;

use Closure;
use loophp\combinator\Combinators;

/**
 * Class Boolean.
 *
 * phpcs:disable Generic.Files.LineLength.TooLong
 */
final class Boolean
{
    public static function CAnd(): Closure
    {
        return static fn (callable $l): Closure => static fn (callable $c): Closure => $l($c)(self::CFalse());
    }

    public static function CFalse(): Closure
    {
        return Combinators::Ki();
    }

    public static function CIf(): Closure
    {
        return Combinators::I();
    }

    public static function CNot(): Closure
    {
        return Combinators::C();
    }

    public static function COr(): Closure
    {
        return Combinators::M();
    }

    public static function CTrue(): Closure
    {
        return Combinators::K();
    }

    public static function CXor(): Closure
    {
        return static fn (callable $a): Closure => static fn (callable $b): Closure => ($a($b(self::CFalse())(self::CTrue())))($b(self::CTrue())(self::CFalse()));
    }

    public static function eq(): Closure
    {
        return static fn (callable $a): Closure => static fn (callable $b): Closure => self::CAnd()(self::lte()($a)($b))(self::lte()($b)($a));
    }

    public static function gt(): Closure
    {
        return static fn (callable $a): Closure => static fn (callable $b): Closure => self::CNot()(self::lte()($a)($b));
    }

    public static function gte(): Closure
    {
        return static fn (callable $a): Closure => static fn (callable $b): Closure => self::isZero()(Numeral::minus()($b)($a));
    }

    public static function isZero(): Closure
    {
        return static fn (callable $a): Closure => $a(Combinators::K()(self::CFalse()))(self::CTrue());
    }

    public static function lt(): Closure
    {
        return static fn (callable $a): Closure => static fn (callable $b): Closure => self::CNot()(self::gte()($a)($b));
    }

    public static function lte(): Closure
    {
        return static fn (callable $a): Closure => static fn (callable $b): Closure => self::isZero()(Numeral::minus()($a)($b));
    }
}
