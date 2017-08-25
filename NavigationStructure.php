<?php

class NavigationStructure extends Structure
{
    public function __construct()
    {
        // x-axis
        $this->addTriangle(new Triangle(
            new Point(1000, -100, 100),
            new Point(1000, -100, -100),
            new Point(1000, 200, 0),
            'black'
        ));
        $this->addTriangle(new Triangle(
            new Point(-1000, -100, 100),
            new Point(-1000, -100, -100),
            new Point(-1000, 200, 0),
            'red'
        ));

        // y-axis
        $this->addTriangle(new Triangle(
            new Point(-100, 1000, 100),
            new Point(-100, 1000, -100),
            new Point(200, 1000, 0),
            'black'
        ));
        $this->addTriangle(new Triangle(
            new Point(200, 1000, 100),
            new Point(200, 1000, -100),
            new Point(500, 1000, 0),
            'black'
        ));
        $this->addTriangle(new Triangle(
            new Point(-100, -1000, 100),
            new Point(-100, -1000, -100),
            new Point(200, -1000, 0),
            'red'
        ));
        $this->addTriangle(new Triangle(
            new Point(200, -1000, 100),
            new Point(200, -1000, -100),
            new Point(500, -1000, 0),
            'red'
        ));

        // z-axis
        $this->addTriangle(new Triangle(
            new Point(100, -100, 1000),
            new Point(-100, -100, 1000),
            new Point(0, 200, 1000),
            'black'
        ));
        $this->addTriangle(new Triangle(
            new Point(300, -100, 1000),
            new Point(100, -100, 1000),
            new Point(200, 200, 1000),
            'black'
        ));
        $this->addTriangle(new Triangle(
            new Point(100, -100, -1000),
            new Point(-100, -100, -1000),
            new Point(0, 200, -1000),
            'red'
        ));
        $this->addTriangle(new Triangle(
            new Point(300, -100, -1000),
            new Point(100, -100, -1000),
            new Point(200, 200, -1000),
            'red'
        ));
    }
}