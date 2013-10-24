<?php
/*
 * Money Class
 * - value object pattern 사용
 */

abstract class Money {
    protected   $amount;          // 하위 클래스 가시성 때문에 private -> protected 로 변경
    protected   $currency;

    abstract function times($multiplier);

    public function __construct($amount, $currency) {
        $this->amount = $amount;
        $this->currency = $currency;
    }

    // php 에서는 객체의 type casting 이 필요 없음
    public function equals($object) {
        return ($this->amount == $object->amount && get_class($this) == get_class($object));
    }

    public function currency() {
        return $this->currency;
    }

    /////////////////////
    // factory mothod
    /////////////////////
    public static function dollar($amount) {
        return new Dollar($amount, "USD");
    }

    public static function franc($amount) {
        return new Franc($amount, "CHF");
    }
}


class Dollar extends Money {

    public function __construct($amount, $currency = "USD") {
        parent::__construct($amount, $currency);
        return $this;
    }

    public function times($multiplier = 1) {
        return new Dollar($this->amount * $multiplier, $this->currency());
    }
    
}


class Franc extends Money {

    public function __construct($amount, $currency = "CHF") {
        parent::__construct($amount, $currency);
        return $this;
    }

    public function times($multiplier = 1) {
        return new Franc($this->amount * $multiplier, $this->currency());
    }

}
