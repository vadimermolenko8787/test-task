<?php

namespace tests\unit;

use app\components\services\EvenSumCalculator;
use PHPUnit\Framework\TestCase;

class EvenSumCalculatorTest extends TestCase
{
    private EvenSumCalculator $calculator;

    protected function setUp(): void
    {
        $this->calculator = new EvenSumCalculator();
    }

    public function testPositiveScenario(): void
    {
        $this->assertSame(6, $this->calculator->calculate([1, 2, 3, 4]));
    }

    public function testEmptyArray(): void
    {
        $this->assertSame(0, $this->calculator->calculate([]));
    }

    public function testNoEvenNumbers(): void
    {
        $this->assertSame(0, $this->calculator->calculate([1, 3, 5, 7]));
    }

    public function testNegativeEvenNumbers(): void
    {
        $this->assertSame(-6, $this->calculator->calculate([-2, -4, 1, 3]));
    }
}
