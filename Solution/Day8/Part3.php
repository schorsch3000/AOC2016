<?php
namespace AdventOfCode\Solution\Day8;
class Part3 extends Part1 {
    public function solve($delay=false)
    {

        $display = new Display(50, 6);
        foreach($this->input as $k=>$instruction) {
            $display->runInstruction($instruction);
            $basename=str_pad($k,6,0,STR_PAD_LEFT);
            $display->writeImage("$basename.pgm");
            system("convert $basename.pgm -scale 2000% $basename.gif");
            unlink("$basename.pgm");
        }
        system("convert -delay 10 -loop 0 0*.gif anim.gif");
        system("rm 0*.gif");

        return $display->getPixelCount();

    }
}
