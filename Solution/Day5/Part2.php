<?php
namespace AdventOfCode\Solution\Day5;

class Part2
{
    protected $input;

    public function __construct($input)
    {
        $this->input = $input;
    }

    public function solve()
    {
        $pass = new Password();
        return $pass->generateType2($this->input);
    }
}
