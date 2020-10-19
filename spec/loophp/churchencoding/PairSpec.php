<?php

declare(strict_types=1);

namespace spec\loophp\churchencoding;

use Closure;
use loophp\churchencoding\Pair;
use PhpSpec\ObjectBehavior;

class PairSpec extends ObjectBehavior
{
    public function it_can_get_first()
    {
        $this::of()('a')('b')(true)
            ->shouldReturn('a');
    }

    public function it_can_get_second()
    {
        $this::of()('a')('b')(false)
            ->shouldReturn('b');
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(Pair::class);

        $this::of()('a')('b')
            ->shouldBeAnInstanceOf(Closure::class);
    }
}
