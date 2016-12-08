<?php

namespace AdventOfCode\Solution\Day8;


class Display
{
    protected $pixel = [];

    public function __construct($x, $y)
    {
        $row = [];
        while ($x--) {
            $row[] = false;
        }
        while ($y--) {
            $this->pixel[] = $row;
        }
    }

    public function runInstruction($instructions,$delay=false)
    {
        foreach ((array)$instructions as $instruction) {
            if($delay) {
                usleep($delay);
            }
            echo "\n\n", str_repeat("=", strlen($instruction)), "\n";
            echo $instruction, "\n";
            if (preg_match("/^rect (\\d+)x(\\d+)$/", $instruction, $match)) {
                $this->rect($match[1], $match[2]);
            } elseif (preg_match("/^rotate row y=(\\d+) by (\\d+)$/", $instruction, $match)) {
                $this->rotateRow($match[1], $match[2]);
            } elseif (preg_match("/^rotate column x=(\\d+) by (\\d+)$/", $instruction, $match)) {
                $this->rotateColumn($match[1], $match[2]);
            } else {
                throw new \Exception("Instruction unclear: '$instruction'");
            }
            $this->display();

        }
    }

    protected function rect($x, $y)
    {
        for ($xpos = 0; $xpos < $x; $xpos++) {
            for ($ypos = 0; $ypos < $y; $ypos++) {
                $this->pixel[$ypos][$xpos] = true;
            }

        }
    }

    protected function rotateRow($y, $distance)
    {
        while ($distance--) {
            array_unshift($this->pixel[$y], array_pop($this->pixel[$y]));
        }
    }

    protected function rotateColumn($x, $distance)
    {
        $buf = [];
        for ($i = 0; $i < $distance; $i++) {
            array_push($buf, $this->pixel[$i][$x]);
        }
        $rowCount = count($this->pixel);
        for ($i = $distance; $i < $distance + $rowCount; $i++) {
            array_push($buf, $this->pixel[$i % $rowCount][$x]);

            $this->pixel[$i % $rowCount][$x] = array_shift($buf);
        }


    }

    public function display($prefix = "\n", $onChar = "■", $offChar = "□")
    {
        echo $prefix;
        foreach ($this->pixel as $col) {
            foreach ($col as $pixel) {
                if ($pixel) {
                    echo $onChar;
                } else {
                    echo $offChar;
                }
                echo " ";
            }
            echo "\n";
        }
    }

    public function getPixelCount()
    {

        $sum = 0;
        foreach (new \RecursiveIteratorIterator(new \RecursiveArrayIterator($this->pixel)) as $pixel) {
            $sum += $pixel;
        }
        return $sum;
    }
}