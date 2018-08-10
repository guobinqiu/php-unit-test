<?php

namespace tests\App\DI;

use App\DI\ClassA;
use App\DI\ClassB;

class ClassATest extends \PHPUnit_Framework_TestCase
{
    public function testGetScoreName90()
    {
        $b = $this->getMock(ClassB::class);

        $b->expects($this->any())
            ->method('getScore')
            ->will($this->returnValue(90));

        $a = new ClassA();
        $this->assertEquals('优', $a->getScoreName($b));
    }

    public function testGetScoreName100()
    {
        $b = $this->getMock(ClassB::class);

        $b->expects($this->any())
            ->method('getScore')
            ->will($this->returnValue(100));

        $a = new ClassA();
        $this->assertEquals('优', $a->getScoreName($b));
    }

    public function testGetScoreName0()
    {
        $b = $this->getMock(ClassB::class);

        $b->expects($this->any())
            ->method('getScore')
            ->will($this->returnValue(0));

        $a = new ClassA();
        $this->assertEquals('良', $a->getScoreName($b));
    }

    public function testGetScoreName89()
    {
        $b = $this->getMock(ClassB::class);

        $b->expects($this->any())
            ->method('getScore')
            ->will($this->returnValue(89));

        $a = new ClassA();
        $this->assertEquals('良', $a->getScoreName($b));
    }

    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage Invalid score number
     */
    public function testGetScoreName101()
    {
        $b = $this->getMock(ClassB::class);

        $b->expects($this->any())
            ->method('getScore')
            ->will($this->returnValue(101));

        $a = new ClassA();
        $a->getScoreName($b);
    }
}
