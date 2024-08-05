<?php
require "src\libraries\Calculos.php" ;
use PHPUnit\Framework\TestCase;

class CalculosTest extends TestCase
{
    public function test_add()
    {
        $calc = new Calculos;
        $this->assertEquals($calc->add(2,4),8);
    }

    public function test_IsNull()
    {
        $calc = new Calculos;
        $this->assertFalse($calc->isNull('Jonas'));
    }

    public function test_IsNull2()
    {
        $calc = new Calculos;
        $this->assertTrue($calc->isNull(''));
    }

    public function test_CalcArray()
    {
        $calc = new Calculos;
        $array =[1,2,3];
        $this->assertCount($calc->CalcArray($array),$array);
    }
}