<?php
/**
 * Created by IntelliJ IDEA.
 * User: dicky
 * Date: 06.12.16
 * Time: 20:37
 */

namespace AdventOfCode\Solution\Day3;


class Triangle
{
    protected $lengths=[];
    public function setLengths(array $length)
    {
        $this->lengths = $length;
    }
    public function setLength($position,$length)
    {
        $this->lengths[$position] = $length;
    }

    public function isValid(){
        return (
            $this->lengths[0] + $this->lengths[1] > $this->lengths[2] &&
            $this->lengths[1] + $this->lengths[2] > $this->lengths[0] &&
            $this->lengths[0] + $this->lengths[2] > $this->lengths[1]
        );
    }

}