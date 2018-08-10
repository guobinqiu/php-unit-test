<?php

namespace tests\App\NoDI;

use App\NoDI\ClassA;
use App\NoDI\ClassB;

/**
 * @runTestsInSeparateProcesses
 * @preserveGlobalState disabled
 */
class ClassATest extends \PHPUnit_Framework_TestCase
{
    public function testGetScoreName90()
    {
        $b = \Mockery::mock('overload:' . ClassB::class);

        $b->shouldReceive('getScore')
            ->andReturn(90);

        $a = new ClassA();
        $this->assertEquals('优', $a->getScoreName());
    }

    public function testGetScoreName100()
    {
        $b = \Mockery::mock('overload:' . ClassB::class);

        $b->shouldReceive('getScore')
            ->andReturn(100);

        $a = new ClassA();
        $this->assertEquals('优', $a->getScoreName());
    }

    public function testGetScoreName0()
    {
        $b = \Mockery::mock('overload:' . ClassB::class);

        $b->shouldReceive('getScore')
            ->andReturn(0);

        $a = new ClassA();
        $this->assertEquals('良', $a->getScoreName());
    }

    public function testGetScoreName89()
    {
        $b = \Mockery::mock('overload:' . ClassB::class);

        $b->shouldReceive('getScore')
            ->andReturn(89);

        $a = new ClassA();
        $this->assertEquals('良', $a->getScoreName());
    }

    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage Invalid score number
     */
    public function testGetScoreName101()
    {
        $b = \Mockery::mock('overload:' . ClassB::class);

        $b->shouldReceive('getScore')
            ->andReturn(101);

        $a = new ClassA();
        $a->getScoreName();
    }
}
