<?php

namespace App;

class CalculatePoint
{
    public function CalculatePoint(int $amount): int
    {
        if ($amount < 1000){
            return 0;
        }

        if ($amount < 10000){
            $basePoint = 1;
        } else {
            $basePoint = 2;
        }

        return intval($amount/100) * $basePoint;
    }
}