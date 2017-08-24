<?php

class Triangle
{
    private $point1;
    private $point2;
    private $point3;

    private $colour;

    public function __construct(Point3D $point1, Point3D $point2, Point3D $point3, $colour = 'red')
    {
        $this->point1 = $point1;
        $this->point2 = $point2;
        $this->point3 = $point3;

        $this->colour = $colour;
    }

    public function visible($player)
    {
        foreach ([$this->point1, $this->point2, $this->point3] as $point) {
            if (!$point->visible($player)) {
                return false;
            }
        }

        return true;
    }

    public function flatten($player)
    {
        return [
            'points' => [
                $this->point1->flatten($player),
                $this->point2->flatten($player),
                $this->point3->flatten($player),
            ],
            'colour' => $this->colour
        ];
    }
}