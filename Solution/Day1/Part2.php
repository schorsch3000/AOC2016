<?php
namespace AdventOfCode\Solution\Day1;

class Part2 extends Part1
{
    protected $visitedPositions = ["0|0" => true];

    public function solve()
    {
        foreach (explode(",", $this->input) as $instruction) {
            $rotation = $instruction[0];
            $distance = $instruction[1];
            $this->currentDirection = $this->nextDirections[$this->currentDirection][$rotation];
            for ($i = 0; $i < $distance; $i++) {
                $this->currentPosition[0] += $this->directions[$this->currentDirection][0];
                $this->currentPosition[1] += $this->directions[$this->currentDirection][1];
                $positionIdentifier = implode("|", $this->currentPosition);
                if (isset($this->visitedPositions[$positionIdentifier])) {
                    return abs($this->currentPosition[0]) + abs($this->currentPosition[1]);
                }
                $this->visitedPositions[$positionIdentifier] = true;
            }
        }

    }
}
