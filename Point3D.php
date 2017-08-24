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

    public function visible($player)
    {
        if ($player['elevation'] > -pi() / 2 && $player['elevation'] <= pi() / 2) {
            return abs($player['elevation'] - atan2($this->z, $this->y)) < pi() / 2;
        }
        else {
            return !(abs($player['elevation'] - atan2($this->z, $this->y)) > pi() / 2);
        }
    }

    public function flatten($player)
    {
        return [
            'x' => $player['depth'] * $this->x / $this->z,
            //'y' => $player['depth'] * $this->y / $this->z
            'y' => $player['depth'] * tan($player['elevation'] - atan2($this->z, $this->y))
        ];
    }
}