<?php
namespace AdventOfCode\Solution\Day1;

class Part1
{
    protected $input;
    protected $currentDirection = 'u';
    protected $currentPosition = [0, 0];

    protected $directions = [
        'u' => [1, 0,],
        'l' => [0, 1,],
        'd' => [-1, 0,],
        'r' => [0, -1,],
    ];

    protected $nextDirections = [
        'u' => ['L' => 'l', 'R' => 'r',],
        'l' => ['L' => 'd', 'R' => 'u',],
        'd' => ['L' => 'r', 'R' => 'l',],
        'r' => ['L' => 'u', 'R' => 'd',],
    ];


    public function __construct($input)
    {
        $this->input = str_replace(" ", "", $input);
    }

    public function solve()
    {


        foreach (explode(",", $this->input) as $instruction) {
            $rotation = $instruction[0];
            $distance = $instruction[1];
            $this->currentDirection = $this->nextDirections[$this->currentDirection][$rotation];

            $this->currentPosition[0] += $distance * $this->directions[$this->currentDirection][0];
            $this->currentPosition[1] += $distance * $this->directions[$this->currentDirection][1];
        }
        return abs($this->currentPosition[0]) + abs($this->currentPosition[1]);

    }
}
