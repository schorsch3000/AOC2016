<?php
namespace AdventOfCode\Solution\Day9;
class Part2 extends Part1 {
    protected $input;
    public function __construct($input)
    {
        $this->input = $input;
    }
    public function solve()
    {
        return $this->getDecompressedLength($this->input,true);
    }
}
