<?php
namespace AdventOfCode\Solution\Day3;

class Part2
{
    protected $input;

    public function __construct($input)
    {
        $this->input = explode("\n", $input);
    }

    public function solve()
    {
        $triangles = [new Triangle(), new Triangle(), new Triangle()];
        $validTriangles = 0;
        foreach ($this->input as $num => $triangleValues) {
            $position = $num % 3;
            $rowValues = preg_split("/ +/", trim($triangleValues));
            for ($i = 0; $i < 3; $i++) {
                $triangles[$i]->setLength($position, $rowValues[$i]);
            }
            if (2 === $position) {
                for ($i = 0; $i < 3; $i++) {
                    if ($triangles[$i]->isValid()) {
                        $validTriangles++;
                    }
                }
            }
        }
        return $validTriangles;
    }
}
