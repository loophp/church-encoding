<?php

/**
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

declare(strict_types=1);

namespace spec\loophp\churchencoding;

use loophp\churchencoding\CList;
use loophp\churchencoding\Numeral;
use PhpSpec\ObjectBehavior;

class CListSpec extends ObjectBehavior
{
    public function it_can_do_foldl()
    {
        $list = CList::cons()(Numeral::one())(CList::cons()(Numeral::two())(CList::cons()(Numeral::three())(CList::nil())));

        $this::foldl()(Numeral::plus())(Numeral::zero())($list)($this->increment())($this->init())
            ->shouldReturn(6);

        $this::foldl()(Numeral::plus())(Numeral::zero())($this::concat()($list)($list))($this->increment())($this->init())
            ->shouldReturn(12);

        $this::foldl()(Numeral::plus())(Numeral::zero())($this::tail()($list))($this->increment())($this->init())
            ->shouldReturn(5);

        $this::foldl()(Numeral::plus())(Numeral::zero())($this::range()(Numeral::zero())(Numeral::five()))($this->increment())($this->init())
            ->shouldReturn(15);

        $this::foldl()(Numeral::plus())(Numeral::zero())($this::repeat()(Numeral::five())(Numeral::five()))($this->increment())($this->init())
            ->shouldReturn(25);

        $list = CList::cons()(static fn () => 'a')(CList::cons()(static fn () => 'b')(CList::nil()));

        $this::foldl()(static fn ($a) => static fn ($b) => $a . '[' . $b() . ']')('init')($list)
            ->shouldReturn('init[a][b]');
    }

    public function it_can_do_foldr()
    {
        $list = CList::cons()(Numeral::one())(CList::cons()(Numeral::two())(CList::cons()(Numeral::three())(CList::nil())));

        $this::foldr()(Numeral::plus())(Numeral::zero())($list)($this->increment())($this->init())
            ->shouldReturn(6);

        $this::foldr()(Numeral::plus())(Numeral::zero())($this::concat()($list)($list))($this->increment())($this->init())
            ->shouldReturn(12);

        $this::foldr()(Numeral::plus())(Numeral::zero())($this::tail()($list))($this->increment())($this->init())
            ->shouldReturn(5);

        $this::foldr()(Numeral::plus())(Numeral::zero())($this::range()(Numeral::zero())(Numeral::five()))($this->increment())($this->init())
            ->shouldReturn(15);

        $this::foldr()(Numeral::plus())(Numeral::zero())($this::repeat()(Numeral::five())(Numeral::five()))($this->increment())($this->init())
            ->shouldReturn(25);

        $list = CList::cons()(static fn () => 'a')(CList::cons()(static fn () => 'b')(CList::nil()));

        $this::foldr()(static fn ($a) => static fn ($b) => $a() . '[' . $b . ']')('init')($list)
            ->shouldReturn('a[b[init]]');
    }

    public function it_can_do_head()
    {
        $list = $this::cons()(Numeral::one())(CList::cons()(Numeral::two())(CList::cons()(Numeral::three())(CList::nil())));

        $this::head()($list)($this->increment())($this->init())
            ->shouldReturn(1);
    }

    public function it_can_do_isNil()
    {
        $list = $this::cons()(Numeral::one())(CList::cons()(Numeral::two())(CList::cons()(Numeral::three())(CList::nil())));

        $this::isNil()($list)(true)(false)
            ->shouldReturn(false);

        $this::isNil()(CList::nil())(true)(false)
            ->shouldReturn(true);
    }

    public function it_can_do_length()
    {
        $list = CList::cons()(Numeral::one())(CList::cons()(Numeral::two())(CList::cons()(Numeral::three())(CList::nil())));

        $this::length()($list)($this->increment())($this->init())
            ->shouldReturn(3);
    }

    public function it_can_do_sum()
    {
        $list = CList::cons()(Numeral::one())(CList::cons()(Numeral::two())(CList::cons()(Numeral::three())(CList::nil())));

        $this::sum()($list)($this->increment())($this->init())
            ->shouldReturn(6);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(CList::class);
    }

    private function increment()
    {
        return static fn (int $n): int => $n + 1;
    }

    private function init(): int
    {
        return 0;
    }
}
