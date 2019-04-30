<?php declare(strict_types=1);

namespace Coordinate;

use Webmozart\Assert\Assert;

final class CoordinateSystem implements CoordinateSystemInterface
{
    /**
     * @param Point ...$points
     *
     * @return array
     */
    public function findClosestPoints(Point ...$points): array
    {
        Assert::minCount($points, 2);

        $closestPoints = [$points[0], $points[1]];
        $closestDistance = $points[0]->distanceTo($points[1]);

        $numberOfPoints = count($points);

        foreach ($points as $first => $firstValue) {
            for ($second = $first + 1; $second < $numberOfPoints; $second++) {
                /** @var Point $firstPoint */
                $firstPoint = $firstValue;

                /** @var Point $secondPoint */
                $secondPoint = $points[$second];

                $distance = $firstPoint->distanceTo($secondPoint);

                if ($distance < $closestDistance) {
                    $closestDistance = $distance;
                    $closestPoints = [$firstPoint, $secondPoint];
                }
            }
        }

        return $closestPoints;
    }
}