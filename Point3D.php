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
            'x' => $player['depth'] * $this->x / $this->y,
            'y' => $player['depth'] * $this->z / $this->y
        ];
    }
}