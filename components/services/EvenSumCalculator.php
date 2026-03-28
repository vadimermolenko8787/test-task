<?php

namespace app\components\services;

use app\components\interfaces\EvenSumCalculatorInterface;

class EvenSumCalculator implements EvenSumCalculatorInterface
{
    public function calculate(array $numbers): int
    {
        return array_sum(array_filter($numbers, fn(int $n) => $n % 2 === 0));
    }
}
