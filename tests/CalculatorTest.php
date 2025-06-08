<?php

use PHPUnit\Framework\TestCase;
use Gilmarodp\Haversine\Point;
use Gilmarodp\Haversine\Calculator;

class CalculatorTest extends TestCase
{
    public function test_distance()
    {
        $pointA = new Point(-23.55052, -46.633308);
        $pointB = new Point(-23.55100, -46.634000);

        $distance = Calculator::distance($pointA, $pointB);

        $this->assertGreaterThan(0, $distance);
        $this->assertIsNumeric($distance);
        $this->assertIsFloat($distance);
        $this->assertLessThan(1000, $distance);
    }

    public function test_same_point_distance()
    {
        $point = new Point(-23.55052, -46.633308);
        $distance = Calculator::distance($point, $point);

        $this->assertEquals(0.0, $distance);
    }

    public function test_different_coordinates()
    {
        $pointA = new Point(-23.55052, -46.633308);
        $pointB = new Point(-23.55100, -46.634000);

        $distance = Calculator::distance($pointA, $pointB);

        $this->assertGreaterThan(0, $distance);
    }

    public function test_invalid_coordinates()
    {
        $this->expectException(\TypeError::class);

        $pointA = new Point(-23.55052, -46.633308);
        $pointB = new Point('invalid', 'coordinates');

        Calculator::distance($pointA, $pointB);
    }

    public function test_distance_with_negative_coordinates()
    {
        $pointA = new Point(-23.55052, -46.633308);
        $pointB = new Point(-23.55100, -46.634000);

        $distance = Calculator::distance($pointA, $pointB);

        $this->assertGreaterThan(0, $distance);
        $this->assertIsFloat($distance);
    }

    public function test_distance_with_zero_coordinates()
    {
        $pointA = new Point(0.0, 0.0);
        $pointB = new Point(0.0, 0.0);

        $distance = Calculator::distance($pointA, $pointB);

        $this->assertEquals(0.0, $distance);
    }

    public function test_distance_with_large_coordinates()
    {
        $pointA = new Point(90.0, 180.0);
        $pointB = new Point(-90.0, -180.0);

        $distance = Calculator::distance($pointA, $pointB);

        $this->assertGreaterThan(0, $distance);
        $this->assertIsFloat($distance);
    }
}
