<?php

namespace app\components\interfaces;

interface EvenSumCalculatorInterface
{
    public function calculate(array $numbers): int;
}
