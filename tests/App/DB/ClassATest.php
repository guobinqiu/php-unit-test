<?php

namespace tests\App\DB;

use App\DB\ClassA;

class ClassATest extends \PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        $link = mysqli_connect('localhost', 'root', '');
        mysqli_select_db($link, 'testcase');
        mysqli_query($link, "insert into score(min, max, name) values(0, 89, '良'), (90, 100, '优')");
        mysqli_close($link);
    }

    public function tearDown()
    {
        $link = mysqli_connect('localhost', 'root', '');
        mysqli_select_db($link, 'testcase');
        mysqli_query($link, 'delete from score');
        mysqli_close($link);
    }

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
