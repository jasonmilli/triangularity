<?php

class Universe
{
    private $triangles = [];

    public function addTriangle(Triangle $triangle)
    {
        $this->triangles[] = $triangle;
    }

    public function flatten($player)
    {
        $return = [];

        foreach ($this->triangles as $triangle) {
            if ($triangle->visible($player)) {
                $return[] = $triangle->flatten($player);
            }
        }

        return $return;
    }
}