<?php

class Point3D
{
    private $x;
    private $y;
    private $z;

    public function __construct($x, $y, $z)
    {
        $this->x = $x;
        $this->y = $y;
        $this->z = $z;
    }

    public function flatten($player)
    {
        return [
            'x' => $player['depth']['x'] * $this->x / $this->y,
            'y' => $player['depth']['x'] * $this->z / $this->y
        ];
    }
}