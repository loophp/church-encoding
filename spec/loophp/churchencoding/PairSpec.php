<?php

/**
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

declare(strict_types=1);

namespace spec\loophp\churchencoding;

use Closure;
use loophp\churchencoding\Pair;
use PhpSpec\ObjectBehavior;

class PairSpec extends ObjectBehavior
{
    public function it_can_get_first()
    {
        $this::first()(Pair::of()('a')('b'))
            ->shouldReturn('a');
    }

    public function it_can_get_second()
    {
        $this::second()(Pair::of()('a')('b'))
            ->shouldReturn('b');
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(Pair::class);

        $this::of()('a')('b')
            ->shouldBeAnInstanceOf(Closure::class);
    }
}
