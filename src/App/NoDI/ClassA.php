<?php

namespace App\NoDI;

class ClassA
{
    /**
     * ClassB不是外部注入的，而是在内部固定死的
     *
     * @param $b ClassB
     * @return string
     */
    function getScoreName()
    {
        $b = new ClassB();
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
