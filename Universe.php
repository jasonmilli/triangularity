<?php

class Universe
{
    private $structures = [];

    public function addStructure(Structure $structure)
    {
        $this->structures[] = $structure;
    }

    public function flatten($player)
    {
        $return = [];

        foreach ($this->structures as $structure) {
            $return[] = $structure->flatten($player);
        }

        return $return;
    }
}