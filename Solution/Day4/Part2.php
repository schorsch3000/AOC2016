<?php
namespace AdventOfCode\Solution\Day4;

class Part2
{
    protected $input;

    public function __construct($input)
    {
        $this->input = explode("\n", $input);
    }

    public function solve()
    {
        $room = new Room();
        foreach ($this->input as $roomId) {
            $room->setId($roomId);
            if ($room->isValid()) {
                if("northpole object storage" === $room->getName()){
                    return $room->getSectorId();
                }
            }
        }
    }
}
