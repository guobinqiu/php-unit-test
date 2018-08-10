<?php

namespace App\DI;

class ClassA
{
    /**
     * 依赖注入ClassB
     *
     * @param $b ClassB
     * @return string
     */
    function getScoreName($b)
    {
        $score = $b->getScore();

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
