<?php
require_once dirname(__FILE__) . '/../class/Money.php';

/*
 * 인터페이스
 */

interface Expression {
		
}

/*
 * 클래스
 */
class Sum implements Expression {
	var $augend;		// 피가산수
	var $addend;

	public function __construct($augend, $addend) {
		$this->augend = $augend;
		$this->addend = $addend;
	}
}