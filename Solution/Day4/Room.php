<?php
/**
 * Created by IntelliJ IDEA.
 * User: dicky
 * Date: 06.12.16
 * Time: 20:58
 */

namespace AdventOfCode\Solution\Day4;


class Room
{
    protected $id;

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getSectorId()
    {
        preg_match("/-(\\d+)\\[/", $this->id, $match);
        return (int)$match[1];
    }

    public function isValid()
    {
        preg_match("/([a-z-]+)-\\d+\\[(.*)\\]/", $this->id, $match);
        $chars = count_chars($match[1], 1);
        unset($chars[45]); // no need to couht the dash
        $prefixLength = ceil(log10(1 + max(...$chars)));

        $arrayToSort=[];
        foreach($chars as $char => $count){
            $key=str_pad($count,$prefixLength,0,STR_PAD_LEFT)."_".(255-$char); // we need the count sorted ascending but the char descending...
            $arrayToSort[$key]=$char;
        }

        krsort($arrayToSort);
        $chksum='';
        for($i=0;$i<5;$i++){
            $chksum.=chr(array_shift($arrayToSort));
        }
        return ($chksum === $match[2]);

    }


}