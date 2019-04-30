<?php declare(strict_types=1);

namespace Test;

use Coordinate\CoordinateSystem;
use Coordinate\Point;
use PHPUnit\Framework\TestCase;

final class CoordinateSystemTest extends TestCase
{

    public function test_it_can_find_closest_points(): void
    {
        $closestPoints = [
            new Point(5.0, 5.0),
            new Point(6.0, 6.0)
        ];

        $coordinateSystem = new CoordinateSystem;
        $result = $coordinateSystem->findClosestPoints(
            new Point(5.0, 5.0),
            new Point(10.0, 20.0),
            new Point(35.0, 35.0),
            new Point(6.0, 6.0),
            new Point(99.0, 100.0)
        );

        self::assertEquals($closestPoints, $result);
    }

    public function test_it_can_not_find_closest_point_of_no_points(): void
    {
        $this->expectException(\InvalidArgumentException::class);

        $coordinateSystem = new CoordinateSystem;
        $coordinateSystem->findClosestPoints();
    }

    public function test_it_can_not_find_closest_point_of_one_point(): void
    {
        $this->expectException(\InvalidArgumentException::class);

        $coordinateSystem = new CoordinateSystem;
        $coordinateSystem->findClosestPoints(new Point(6.0, 6.0));
    }
}