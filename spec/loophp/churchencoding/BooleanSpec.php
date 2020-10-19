<?php

declare(strict_types=1);

namespace spec\loophp\churchencoding;

use loophp\churchencoding\Boolean;
use loophp\churchencoding\Numeral;
use PhpSpec\ObjectBehavior;

class BooleanSpec extends ObjectBehavior
{
    public function it_can_check_if_a_numeral_is_eq_to()
    {
        $this::eq()(Numeral::nine())(Numeral::five())(true)(false)
            ->shouldReturn(false);

        $this::eq()(Numeral::five())(Numeral::five())(true)(false)
            ->shouldReturn(true);
    }

    public function it_can_check_if_a_numeral_is_gt_than()
    {
        $this::gt()(Numeral::nine())(Numeral::five())(true)(false)
            ->shouldReturn(true);

        $this::gt()(Numeral::five())(Numeral::nine())(true)(false)
            ->shouldReturn(false);

        $this::gt()(Numeral::nine())(Numeral::nine())(true)(false)
            ->shouldReturn(false);
    }

    public function it_can_check_if_a_numeral_is_gte_than()
    {
        $this::gte()(Numeral::nine())(Numeral::five())(true)(false)
            ->shouldReturn(true);

        $this::gte()(Numeral::five())(Numeral::nine())(true)(false)
            ->shouldReturn(false);

        $this::gte()(Numeral::nine())(Numeral::nine())(true)(false)
            ->shouldReturn(true);
    }

    public function it_can_check_if_a_numeral_is_lt_than()
    {
        $this::lt()(Numeral::nine())(Numeral::five())(true)(false)
            ->shouldReturn(false);

        $this::lt()(Numeral::five())(Numeral::nine())(true)(false)
            ->shouldReturn(true);

        $this::lt()(Numeral::nine())(Numeral::nine())(true)(false)
            ->shouldReturn(false);
    }

    public function it_can_check_if_a_numeral_is_lte_than()
    {
        $this::lte()(Numeral::nine())(Numeral::five())(true)(false)
            ->shouldReturn(false);

        $this::lte()(Numeral::five())(Numeral::nine())(true)(false)
            ->shouldReturn(true);

        $this::lte()(Numeral::nine())(Numeral::nine())(true)(false)
            ->shouldReturn(true);
    }

    public function it_can_check_if_a_numeral_is_zero()
    {
        $this::isZero()(Numeral::nine())(true)(false)
            ->shouldReturn(false);

        $this::isZero()(Numeral::zero())(true)(false)
            ->shouldReturn(true);
    }

    public function it_can_do_if_then_else()
    {
        $this::CIf()($this::CTrue())(true)(false)
            ->shouldReturn(true);

        $this::CIf()($this::CFalse())(true)(false)
            ->shouldReturn(false);
    }

    public function it_can_proof_false_xor_false()
    {
        $this::CXOr()($this::CFalse())($this::CFalse())(true)(false)
            ->shouldReturn(false);
    }

    public function it_can_proof_logical_false_and_false()
    {
        $this::CAnd()($this::CFalse())($this::CFalse())(true)(false)
            ->shouldReturn(false);
    }

    public function it_can_proof_logical_false_or_false()
    {
        $this::COr()($this::CFalse())($this::CFalse())(true)(false)
            ->shouldReturn(false);
    }

    public function it_can_proof_logical_not_false()
    {
        $this::CNot()($this::CFalse())(true)(false)
            ->shouldReturn(true);
    }

    public function it_can_proof_logical_not_true()
    {
        $this::CNot()($this::CTrue())(true)(false)
            ->shouldReturn(false);
    }

    public function it_can_proof_logical_true_and_false()
    {
        $this::CAnd()($this::CTrue())($this::CFalse())(true)(false)
            ->shouldReturn(false);
    }

    public function it_can_proof_logical_true_and_true()
    {
        $this::CAnd()($this::CTrue())($this::CTrue())(true)(false)
            ->shouldReturn(true);
    }

    public function it_can_proof_logical_true_or_false()
    {
        $this::COr()($this::CTrue())($this::CFalse())(true)(false)
            ->shouldReturn(true);
    }

    public function it_can_proof_logical_true_or_true()
    {
        $this::COr()($this::CTrue())($this::CTrue())(true)(false)
            ->shouldReturn(true);
    }

    public function it_can_proof_not_true_and_true()
    {
        $this::CNot()(
            ($this::CAnd())($this::CTrue())($this::CTrue())
        )(true)(false)
            ->shouldReturn(false);
    }

    public function it_can_proof_true_xor_false()
    {
        $this::CXOr()($this::CTrue())($this::CFalse())(true)(false)
            ->shouldReturn(true);
    }

    public function it_can_proof_true_xor_true()
    {
        $this::CXOr()($this::CTrue())($this::CTrue())(true)(false)
            ->shouldReturn(false);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(Boolean::class);
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
