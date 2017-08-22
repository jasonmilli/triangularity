<?php

class Triangle
{
    private $point1;
    private $point2;
    private $point3;

    public function __construct(Point3D $point1, Point3D $point2, Point3D $point3)
    {
        $this->point1 = $point1;
        $this->point2 = $point2;
        $this->point3 = $point3;
    }

    public function flatten($player)
    {
        return [
            $this->point1->flatten($player),
            $this->point2->flatten($player),
            $this->point3->flatten($player)
        ];
    }
}