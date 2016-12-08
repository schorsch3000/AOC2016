<?php

namespace AdventOfCode\Solution\Day7;


class IPv7
{
    protected $address;

    public function setAddress($address)
    {
        $this->address = $address;
    }

    public function hasTLSSupport()
    {
        $matches = [1 => []];
        if (preg_match_all("/\\[([^\\]]*)\\]/", $this->address, $matches)) {
            foreach ($matches[1] as $hypernetSequence) {
                if ($this->hasABBA($hypernetSequence)) {
                    return false;
                }
            }
        }
        $addressWithoutHypernetSequence = str_replace($matches[1], '', $this->address);
        return $this->hasABBA($addressWithoutHypernetSequence);

    }

    private function hasABBA($stringToTest)
    {
        if (preg_match_all('/(.)((?:(?!\1).))\2\1/', $stringToTest, $matches)) {
            return true;
        }
        return false;
    }

    public function hasSSLSupport()
    {
        return preg_match('/((?!(.)\2)(.)(.)\3(?:\[[^]]*\]|\][^[]*\[|[^[\]])*[[\]][^[\]]*\4\3\4)/',$this->address);
    }
}