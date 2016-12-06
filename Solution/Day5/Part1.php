<?php
namespace AdventOfCode\Solution\Day5;
class Part1{
    protected $input;
    public function __construct($input)
    {
        $this->input = $input;
    }
    public function solve(){
        $pass=new Password();
        return $pass->generate($this->input);
    }
}
