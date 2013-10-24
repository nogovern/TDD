<?php
/*
 * Money Class
 * - value object pattern 사용
 */

class Money {
    protected   $amount;          // 하위 클래스 가시성 때문에 private -> protected 로 변경
    protected   $currency;

    public function __construct($amount, $currency) {
        $this->amount = $amount;
        $this->currency = $currency;

        return $this;
    }

    // php 에서는 객체의 type casting 이 필요 없음
    public function equals($object) {
        return ($this->amount == $object->amount && $this->currency() == $object->currency());
    }

    public function currency() {
        return $this->currency;
    }

    public function times($multiplier) {
        return new Money( $this->amount * $multiplier, $this->currency());
    }
    /////////////////////
    // factory mothod
    /////////////////////
    public static function dollar($amount) {
        return new Money($amount, "USD");
    }

    public static function franc($amount) {
        return new Money($amount, "CHF");
    }
}

//
// There is no need to exist sub classes.
// therefore below classes will be removed...

class Dollar extends Money {

    public function __construct($amount, $currency = "USD") {
        parent::__construct($amount, $currency);
        return $this;
    }
    
}


class Franc extends Money {

    public function __construct($amount, $currency = "CHF") {
        parent::__construct($amount, $currency);
        return $this;
    }

}
