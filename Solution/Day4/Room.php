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

    public function getSectorId(){
        preg_match("/-\\d+\\[/",$this->id,$match);
        print_r($match);
    }


}