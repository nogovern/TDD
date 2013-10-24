<?php
//namespace Tests;

require_once 'PHPUnit/Autoload.php';
require_once dirname(__FILE__) . '/../class/Money.php';

class MoneyTest extends \PHPUnit_Framework_TestCase
{
    
    // 한글도 잘 되네요...
    public function setUp() {
    	
    }
    
    // 안녕하세요... 반갑습니다.
    // tearDown 메소드 테스트 마다 실행된다고 함...
    public function tearDown() {

    }

    public function testEquality() {
        $dollar = Money::dollar(5);
        $this->assertTrue($dollar->equals(Money::dollar(5)));
        $this->assertFalse($dollar->equals(Money::dollar(6)));
        $franc = Money::franc(5);
        $this->assertTrue($franc->equals(new Franc(5)));
        $this->assertFalse($franc->equals(new Franc(6)));
        $this->assertFalse($franc->equals(new Dollar(5)));          // 7장. 달러와 프랑의 비교
    }

    public function testFracMuliplication() {
        $five = Money::franc(5);
        $this->assertEquals(Money::franc(10), $five->times(2));     // object 간의 비교
        $this->assertEquals(Money::franc(15), $five->times(3));   
    }

    public function testMultiplication() {
        $dollar = Money::dollar(5);
        $this->assertEquals(Money::dollar(10), $dollar->times(2));     // object 간의 비교
        $this->assertEquals(Money::dollar(15), $dollar->times(3));
    }

    public function testCurrency() {
        $this->assertEquals("USD", Money::dollar(1)->currency());
        $this->assertEquals("CHF", Money::franc(1)->currency());
    }
}

# 2013-10-21 - TDD 4장.프라이버시 까지
# amount 에 직접 접근하는 코드가 없어졌으니 private 로 변경할 수 있음.


