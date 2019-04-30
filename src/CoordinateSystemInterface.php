<?php declare(strict_types=1);

namespace Coordinate;

interface CoordinateSystemInterface
{
    /**
     * @param Point ...$points
     *
     * @return array
     */
    public function findClosestPoints(Point ...$points): array;
}