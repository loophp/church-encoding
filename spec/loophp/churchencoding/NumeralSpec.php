<?php

/**
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

declare(strict_types=1);

namespace spec\loophp\churchencoding;

use loophp\churchencoding\Numeral;
use PhpSpec\ObjectBehavior;

class NumeralSpec extends ObjectBehavior
{
    public function it_can_convert_a_integer_to_numeral()
    {
        $this::toNumeral(100)($this->increment())($this->init())
            ->shouldReturn(100);

        $this::toNumeral(17)($this->increment())($this->init())
            ->shouldReturn(17);

        $this::toNumeral(1)($this->increment())($this->init())
            ->shouldReturn(1);
    }

    public function it_can_convert_numeral_to_int()
    {
        $this->toInt(Numeral::three())
            ->shouldReturn(3);
    }

    public function it_can_do_church_numerals()
    {
        $this::zero()($this->increment())($this->init())
            ->shouldReturn(0);

        $this::one()($this->increment())($this->init())
            ->shouldReturn(1);

        $this::two()($this->increment())($this->init())
            ->shouldReturn(2);

        $this::three()($this->increment())($this->init())
            ->shouldReturn(3);

        $this::four()($this->increment())($this->init())
            ->shouldReturn(4);

        $this::five()($this->increment())($this->init())
            ->shouldReturn(5);

        $this::six()($this->increment())($this->init())
            ->shouldReturn(6);

        $this::seven()($this->increment())($this->init())
            ->shouldReturn(7);

        $this::eight()($this->increment())($this->init())
            ->shouldReturn(8);

        $this::nine()($this->increment())($this->init())
            ->shouldReturn(9);
    }

    public function it_can_do_exp()
    {
        $this::exponentiation()($this::four())($this::two())($this->increment())($this->init())
            ->shouldReturn(16);
    }

    public function it_can_do_multiplications()
    {
        $this::multiply()($this::four())($this::three())($this->increment())($this->init())
            ->shouldReturn(12);
    }

    public function it_can_do_substractions()
    {
        $this::minus()($this::nine())($this::seven())($this->increment())($this->init())
            ->shouldReturn(2);

        $this::minus()($this::seven())($this::nine())($this->increment())($this->init())
            ->shouldReturn(0);
    }

    public function it_can_do_sums()
    {
        $this::plus()($this::nine())($this::eight())($this->increment())($this->init())
            ->shouldReturn(17);
    }

    public function it_can_proof_that_next_4_equal_5()
    {
        $this::succ()($this::four())($this->increment())($this->init())
            ->shouldReturn(5);
    }

    public function it_can_proof_that_pred_4_equal_3()
    {
        $this::pred()($this::four())($this->increment())($this->init())
            ->shouldReturn(3);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(Numeral::class);
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
