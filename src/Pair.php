<?php

declare(strict_types=1);

namespace loophp\churchencoding;

use Closure;
use loophp\combinator\Combinators;

/**
 * Class Pair.
 *
 * phpcs:disable Generic.Files.LineLength.TooLong
 */
final class Pair
{
    public static function first(): Closure
    {
        return Combinators::T()(Combinators::K());
    }

    public static function of(): Closure
    {
        return Combinators::V();
    }

    public static function second(): Closure
    {
        return Combinators::T()(Combinators::Ki());
    }
}
