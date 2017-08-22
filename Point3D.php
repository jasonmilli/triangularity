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
        $depth = [
            'x' => $player['window']['x'] / 2 / tan($player['window']['zoom']),
            'y' => $player['window']['y'] / 2 / tan($player['window']['zoom'])
        ];

        $distance = sqrt(pow($this->x - $player['x'], 2) + pow($this->y - $player['y'], 2) + pow($this->z - $player['z'], 2));
        //output($distance);

        $xRatio = $distance / $depth['x'];
        $yRatio = $distance / $depth['y'];

        $real['x'] = $this->x / $xRatio + $player['window']['x'] / 2;
        $real['y'] = $player['window']['y'] / 2 - $this->z / $yRatio;

        //output($real);

        return $real;
    }
}