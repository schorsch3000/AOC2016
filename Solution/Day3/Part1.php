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
        $triangle = new Triangle();
        foreach ($this->input as $triangleValues) {
            $triangle->setLengths(preg_split("/ +/", trim($triangleValues)));
            if ($triangle->isValid()) {
                $validTriangles++;
            }
        }

        return $validTriangles;

    }
}
