<?php
/*
 * Money Class
 * - value object pattern 사용
 */

abstract class Money {
    protected $amount;          // 하위 클래스 가시성 때문에 private -> protected 로 변경

    abstract function times($multiplier);

    public function __construct($amount) {
        $this->amount = $amount;
    }

    // php 에서는 객체의 type casting 이 필요 없음
    public function equals($object) {
        return ($this->amount == $object->amount && get_class($this) == get_class($object));
    }

    /////////////////////
    // factory mothod
    /////////////////////
    public static function dollar($amount) {
        return new Dollar($amount);
    }

    public static function franc($amount) {
        return new Franc($amount);
    }
}


class Dollar extends Money {
    private $currency;

    public function __construct($amount = 0) {
        parent::__construct($amount);
        $this->currency = "USD";
        return $this;
    }

    public function times($multiplier = 1) {
        return new Dollar($this->amount * $multiplier);
    }

    public function currency() {
        return $this->currency;
    }
    
}


class Franc extends Money {
    private $currency;

    public function __construct($amount = 0) {
        parent::__construct($amount);
        $this->currency = "CHF";
        return $this;
    }

    public function times($multiplier = 1) {
        return new Franc($this->amount * $multiplier);
    }

    public function currency() {
        return $this->currency;
    }

}
