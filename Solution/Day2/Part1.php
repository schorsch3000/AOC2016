<?php
namespace AdventOfCode\Solution\Day2;

class Part1
{
    protected $input;
    protected $positionType = 'AdventOfCode\Solution\Day2\Position1_9';

    public function __construct($input)
    {
        $this->input = $input;
    }

    public function solve()
    {
        $result = '';
        $position = new $this->positionType();
        foreach (explode("\n", $this->input) as $number) {
            for ($i = 0; $i < strlen($number); $i++) {
                $position->go($number[$i]);
            }
            $result .= $position->get();
        }
        return $result;
    }
}
