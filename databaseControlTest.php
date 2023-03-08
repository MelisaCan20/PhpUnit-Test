<?php
namespace App\Tests\Util;

use App\Util\DatabaseControl;
use App\Util\User;
use PHPUnit\Framework\TestCase;

class DatabaseControlTest extends TestCase{
    public function testConnection(){
        $x=new DatabaseControl();
        $y=$x->dataBaseConnection();
        $this->assertTrue($y==1,"could not connect to database");
    }

  public function testInsertion(){
        $x=new DatabaseControl();
        $y=$x->insertData();
        $this->assertEquals(0,$y);
    }
    public function testUpdate(){
        $x=new DatabaseControl();
        $y=$x->updateData();
        $this->assertTrue(0==$y,"could not update");

    }
    public function testFind(){
        $x=new DatabaseControl();
        $y=$x->checkData();
        $this->assertNotEquals(0,$y);
    }
    public function testTcUzunluk(){
        $x=new DatabaseControl();
        $y=$x->selectData("tc");
        $this->assertEquals(11,$y);
    }
    public function testPasswordUzunluk(){
        $x=new DatabaseControl();
        $y=$x->selectData("password");
        $this->assertGreaterThan(7,$y);
    }

    public function testTcSonRakam(){
        $s=new User();
        $c=$s->cift();
        $this->assertFalse($c%2!=0,"not even");

