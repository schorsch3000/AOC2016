<?php
namespace AdventOfCode\Solution\Day6;

class Part1
{
    protected $input;

    public function __construct($input)
    {
        $this->input = explode("\n", $input);
    }

    public function solve()
    {
        $len = strlen($this->input[0]);
        $msg = "";
        for ($i = 0; $i < $len; $i++) {
            $charlist = [];
            foreach ($this->input as $row) {
                if (isset($charlist[$row[$i]])) {
                    $charlist[$row[$i]]++;
                } else {
                    $charlist[$row[$i]] = 1;
                }
            }
            arsort($charlist);
            $msg .= array_keys($charlist)[0];
        }
        return $msg;
    }
}
