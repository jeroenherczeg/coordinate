<?php declare(strict_types=1);

namespace Coordinate;

use Webmozart\Assert\Assert;

final class Point
{
    /**
     * @var float
     */
    private $x;

    /**
     * @var float
     */
    private $y;

    public function __construct(float $x, float $y)
    {
        Assert::greaterThanEq($x, 0);
        Assert::greaterThanEq($y, 0);

        $this->x = $x;
        $this->y = $y;
    }

    public function getX(): float
    {
        return $this->x;
    }

    public function getY(): float
    {
        return $this->y;
    }

    public function withX(float $x): Point
    {
        if ($x === $this->x) {
            return $this;
        }

        return new self($x, $this->y);
    }

    public function withY(float $y): Point
    {
        if ($y === $this->y) {
            return $this;
        }

        return new self($this->x, $y);
    }

    public function distanceTo(Point $other): float
    {
        return sqrt(
            ($other->x - $this->x) ** 2 +
            ($other->y - $this->y) ** 2
        );
    }
}