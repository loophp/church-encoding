<?php

declare(strict_types=1);

namespace loophp\churchencoding;

use Closure;

/**
 * Class Pair.
 *
 * phpcs:disable Generic.Files.LineLength.TooLong
 */
final class Pair
{
    public static function first(): Closure
    {
        return static fn (callable $a) => $a(true);
    }

    public static function of(): Closure
    {
        return static fn ($a): Closure => static fn ($b): Closure => static fn ($f) => $f ? $a : $b;
    }

    public static function second(): Closure
    {
        return static fn (callable $a) => $a(false);
    }
}
