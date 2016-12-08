<?php
namespace AdventOfCode\Solution\Day8;

class Part1
{
    protected $input;
    protected $delay=false;
    public function __construct($input)
    {
        $this->input = explode("\n", $input);
    }

    public function solve($delay=false)
    {

        $display = new Display(50, 6);
        $display->display("\n\n");
        $display->runInstruction($this->input,$this->delay);
        echo "\n\n\n";
        return $display->getPixelCount();

    }
}
