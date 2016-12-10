<?php
namespace AdventOfCode\Solution\Day10;
class Part2 extends Part1 {

    public function solve()
    {
        $this->run();
        $outputs=$this->botManager->getOutputs();
        return $outputs[0]->getMicroChips()*$outputs[1]->getMicroChips()*$outputs[2]->getMicroChips();

    }
}
