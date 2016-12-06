<?php

namespace AdventOfCode\Solution\Day2;


abstract class Position
{
    protected $position = "5";

    public function get()
    {
        return $this->position;
    }

    public function go($direction)
    {
        $this->position = $this->positions[$this->position][$direction];
        return $this;
    }


}