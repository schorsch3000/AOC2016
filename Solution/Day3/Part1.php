<?php
namespace AdventOfCode\Solution\Day3;

class Part1
{
    protected $input;

    public function __construct($input)
    {
        $this->input = explode("\n", $input);
    }

    public function solve()
    {
        $validTriangles = 0;

        foreach ($this->input as $triangleValues) {
            $triangleValues = preg_split("/ +/", trim($triangleValues));
            if (
                $triangleValues[0] + $triangleValues[1] > $triangleValues[2] &&
                $triangleValues[1] + $triangleValues[2] > $triangleValues[0] &&
                $triangleValues[0] + $triangleValues[2] > $triangleValues[1]
            ) {
                $validTriangles++;
            }
        }

        return $validTriangles;

    }
}
