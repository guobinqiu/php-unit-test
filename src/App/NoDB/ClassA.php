<?php

namespace App\NoDB;

class ClassA
{
    /**
     * @param $score integer
     * @return string
     */
    function getScoreName($score)
    {
        if ($score >= 90 && $score <= 100) {
            $scoreName = '优';
        } elseif ($score >= 0 && $score < 90) {
            $scoreName = '良';
        } else {
            throw new \InvalidArgumentException('Invalid score number');
        }

        return $scoreName;
    }
}
