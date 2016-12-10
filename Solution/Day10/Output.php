<?php

namespace AdventOfCode\Solution\Day10;


class Output implements MicrochipReceiver
{
    protected  $microChips=[];
    public function addMicrochip($microchip)
    {
        $this->microChips[]=$microchip;
    }

    /**
     * @return array
     */
    public function getMicroChips()
    {
        return array_sum($this->microChips);
    }

}