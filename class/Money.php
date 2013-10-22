<?php
/*
 * Money Class
 * - value object pattern 사용
 */

class Money {
    protected $amount;          // 하위 클래스 가시성 때문에 private -> protected 로 변경

    public function __construct($amount) {
        $this->amount = $amount;
    }

    // php 에서는 객체의 type casting 이 필요 없음
    public function equals($object) {
        return ($this->amount == $object->amount && get_class($this) == get_class($object));
    }
}


class Dollar extends Money {

    public function __construct($amount = 0) {
        parent::__construct($amount);
        return $this;
    }

    public function times($multiplier = 1) {
        return new Dollar($this->amount * $multiplier);
    }
    
}


class Franc extends Money {

    public function __construct($amount = 0) {
        parent::__construct($amount);
        return $this;
    }

    public function times($multiplier = 1) {
        return new Franc($this->amount * $multiplier);
    }

}