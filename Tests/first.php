<?php

require_once 'PHPUnit/Autoload.php';
require_once dirname(__FILE__) . '/../class/User.php';

class UserTest extends PHPUnit_Framework_TestCase
{
    // test the talk method
    public function testTalk() {
        // make an instance of the user
        $user = new User();

        // use assertEquals to ensure the greeting is what you
        $expected = "Hello world!";
        $actual = $user->talk();
        $this->assertEquals($expected, $actual);
        $this->assertEquals(1, 2);
    }

    public function testOne() {
        $this->assertTrue(false);
    }
    
    // 한글도 잘 되네요...
    public function setUp() {
    	
    }
    
    // 안녕하세요... 반갑습니다.
    // tearDown 메소드 테스트 마다 실행된다고 함...
    public function tearDown() {
    	echo 'blah blah...';
    }
}

