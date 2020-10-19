<?php

declare(strict_types=1);

namespace spec\loophp\churchencoding;

use loophp\churchencoding\Boolean;
use PhpSpec\ObjectBehavior;

class BooleanSpec extends ObjectBehavior
{
    public function it_can_do_if_then_else()
    {
        $condition = static fn ($n) => 0 === $n % 2 ? 'yes' : 'no';

        $this::CIf()($condition)(4)
            ->shouldReturn('yes');

        $this::CIf()($condition)(5)
            ->shouldReturn('no');

        $condition = static fn ($n) => 0 === $n % 2 ? Boolean::CTrue() : Boolean::CFalse();

        $this::CIf()($condition)(4)(true)(false)
            ->shouldReturn(true);

        $this::CIf()($condition)(5)(true)(false)
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

    public function it_can_proof_that_booleans_can_be_converted_from_their_encoded_forms()
    {
        $this::booleanToPrimitive()(self::CTrue())(true)(false)
            ->shouldReturn(true);

        $this::booleanToPrimitive()(self::CFalse())(true)(false)
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
