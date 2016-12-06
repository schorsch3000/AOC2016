<?php
namespace AdventOfCode\Solution\Day4;

class Part1
{
    protected $input;

    public function __construct($input)
    {
        $this->input = explode("\n", $input);
    }

    public function solve()
    {
        $total = 0;
        $room = new Room();
        foreach ($this->input as $roomId) {
            $room->setId($roomId);
            if ($room->isValid()) {
                $total += $room->getSectorId();
            }
        }
        return $total;
    }
}
