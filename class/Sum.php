<?php

class Sum implements Expression {
	protected $augend;		// 피가산수
	protected $addend;

	public function __construct(Money $augend, Money $addend) 
	{
		$this->augend = $augend;
		$this->addend = $addend;
	}

	public function reduce($to)
	{
		$amount = $this->augend->getAmount() + $this->addend->getAmount();
		return new Money($amount, $to);
	}
}