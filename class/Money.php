<?php
/*
 * Money Class
 * - value object pattern 사용
 */

class Money implements Expression {
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

    public function getAmount()
    {
        return $this->amount;
    }

    public function currency() 
    {
        return $this->currency;
    }

    public function __toString()
    {
        return $this->amount . " " . $this->currency;
    }

    /**
     * 곱하기
     * @param  [type] $multiplier [description]
     * @return [type]             [description]
     */
    public function times($multiplier) {
        return new Money( $this->amount * $multiplier, $this->currency());
    }

    /**
     * 더하기 
     * @param  [type] $addend [description]
     * @return [type]         [description]
     */
    public function plus(Money $addend) {
        // return new Money( $this->amount + $addend->amount, $this->currency);
        return new Sum($this, $addend);
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
// 11장. 더이상 하위 클래스는 사용하지 않음
//


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
