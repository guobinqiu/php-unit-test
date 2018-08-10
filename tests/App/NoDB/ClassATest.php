<?php

namespace tests\App\NoDB;

use App\NoDB\ClassA;

class ClassATest extends \PHPUnit_Framework_TestCase
{
    public function testGetScoreName90()
    {
        $a = new ClassA();
        $this->assertEquals('优', $a->getScoreName(90));
    }

    public function testGetScoreName100()
    {
        $a = new ClassA();
        $this->assertEquals('优', $a->getScoreName(100));
    }

    public function testGetScoreName0()
    {
        $a = new ClassA();
        $this->assertEquals('良', $a->getScoreName(0));
    }

    public function testGetScoreName89()
    {
        $a = new ClassA();
        $this->assertEquals('良', $a->getScoreName(89));
    }

    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage Invalid score number
     */
    public function testGetScoreName101()
    {
        $a = new ClassA();
        $a->getScoreName(101);
    }
}
