<?php declare(strict_types=1);

namespace Test;

use Coordinate\Point;
use PHPUnit\Framework\TestCase;

final class PointTest extends TestCase
{
    public function test_it_can_be_constructed(): void
    {
        $point = new Point(5.0, 23.0);

        self::assertInstanceOf(Point::class, $point);
    }

    public function test_it_can_not_be_constructed_with_negative_x_value(): void
    {
        $this->expectException(\InvalidArgumentException::class);

        new Point(-1.0, 6.0);
    }

    public function test_it_can_not_be_constructed_with_negative_y_value(): void
    {
        $this->expectException(\InvalidArgumentException::class);

        new Point(1.0, -6.0);
    }

    public function test_it_is_immutable_value_object(): void
    {
        $point = new Point(1.0, 6.0);

        $sameValuePoint = $point->withX(1);
        self::assertSame($point, $sameValuePoint);

        $differentPoint = $point->withX(4);
        self::assertNotSame($point, $differentPoint);
    }

    public function test_it_can_calculate_distance_to_other_point() : void
    {
        $point = new Point(1.0, 6.0);
        $other_point = new Point(6.0, 6.0);

        $distance = $point->distanceTo($other_point);

        self::assertEquals(5.0, $distance);
    }

    public function test_it_can_calculate_distance_to_same_point(): void
    {
        $point = new Point(1.0, 6.0);

        $distance = $point->distanceTo($point);

        self::assertEquals(0.0, $distance);
    }
}