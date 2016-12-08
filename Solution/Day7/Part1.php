<?php
namespace AdventOfCode\Solution\Day7;
class Part1
{
    protected $input;

    public function __construct($input)
    {
        $this->input = explode("\n", $input);
    }

    public function solve()
    {

        $ip = new IPv7();
        $total = 0;
        foreach ($this->input as $address) {
            $ip->setAddress($address);
            if ($ip->hasTLSSupport()) {
                $total++;
            }
        }
        return $total;
    }
}
