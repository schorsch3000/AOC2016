<?php
namespace AdventOfCode\Solution\Day5;
class Password
{
    public function generate($doorId,$length=8){
        $pass='';
        $idx=0;
        while(strlen($pass)<$length){
            $hash=md5($doorId.$idx);
            if(substr($hash,0,5) === '00000'){
                $pass.=$hash[5];
            }
            $idx++;
        }
        return $pass;
    }
}
