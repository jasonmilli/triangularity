<?php

class Point
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
            'x' => $player['depth'] * ($this->z ? tan($player['bearing'] - atan2($this->z, $this->x)) : 0),
            'y' => $player['depth'] * ($this->z ? tan($player['elevation'] - atan2($this->z, $this->y)) : 0)
        ];
    }
}