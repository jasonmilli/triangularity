<?php

class NavigationStructure extends Structure
{
    public function __construct()
    {
        // x-axis
        $this->addTriangle(new Triangle(
            new Point3D(1000, -100, 100),
            new Point3D(1000, -100, -100),
            new Point3D(1000, 200, 0),
            'black'
        ));
        $this->addTriangle(new Triangle(
            new Point3D(-1000, -100, 100),
            new Point3D(-1000, -100, -100),
            new Point3D(-1000, 200, 0),
            'red'
        ));

        // y-axis
        $this->addTriangle(new Triangle(
            new Point3D(-100, 1000, 100),
            new Point3D(-100, 1000, -100),
            new Point3D(200, 1000, 0),
            'black'
        ));
        $this->addTriangle(new Triangle(
            new Point3D(200, 1000, 100),
            new Point3D(200, 1000, -100),
            new Point3D(500, 1000, 0),
            'black'
        ));
        $this->addTriangle(new Triangle(
            new Point3D(-100, -1000, 100),
            new Point3D(-100, -1000, -100),
            new Point3D(200, -1000, 0),
            'red'
        ));
        $this->addTriangle(new Triangle(
            new Point3D(200, -1000, 100),
            new Point3D(200, -1000, -100),
            new Point3D(500, -1000, 0),
            'red'
        ));

        // z-axis
        $this->addTriangle(new Triangle(
            new Point3D(100, -100, 1000),
            new Point3D(-100, -100, 1000),
            new Point3D(0, 200, 1000),
            'black'
        ));
        $this->addTriangle(new Triangle(
            new Point3D(300, -100, 1000),
            new Point3D(100, -100, 1000),
            new Point3D(200, 200, 1000),
            'black'
        ));
        $this->addTriangle(new Triangle(
            new Point3D(100, -100, -1000),
            new Point3D(-100, -100, -1000),
            new Point3D(0, 200, -1000),
            'red'
        ));
        $this->addTriangle(new Triangle(
            new Point3D(300, -100, -1000),
            new Point3D(100, -100, -1000),
            new Point3D(200, 200, -1000),
            'red'
        ));
    }
}