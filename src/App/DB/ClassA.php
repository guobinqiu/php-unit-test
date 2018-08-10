<?php

namespace App\DB;

class ClassA
{
    /**
     * 这里用到了数据库查询
     *
     * @param $score integer
     * @return string
     */
    function getScoreName($score)
    {
        $link = mysqli_connect('localhost', 'root', '');

        mysqli_select_db($link, 'testcase');

        $result = mysqli_query($link, "select * from score");

        mysqli_close($link);

        while ($row = mysqli_fetch_array($result)) {

            if ($score >= $row['min'] && $score <= $row['max']) {

                return $row['name'];

            }

        }

        throw new \InvalidArgumentException('Invalid score number');
    }
}
