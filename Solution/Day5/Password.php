<?php
namespace AdventOfCode\Solution\Day5;

class Password
{

    public function generateType1($doorId, $length = 8)
    {
        $pass = '';
        $idx = 0;
        while (strlen($pass) < $length) {
            $hash = md5($doorId . $idx);
            if (substr($hash, 0, 5) === '00000') {
                $pass .= $hash[5];
            }
            $idx++;
        }
        return $pass;
    }

    public function generateType2($doorId, $length = 8)
    {
        $pass = 'XXXXXXXX';
        $idx = 0;
        while (strpos($pass, 'X') !== false) {
            $hash = md5($doorId . $idx);
            if (substr($hash, 0, 5) === '00000') {
                $digit = $hash[6];
                $position = $hash[5];
                if (preg_match('/^[0-7]$/', $position) && substr($pass,$position,1) === 'X') {
                    $pass = substr_replace($pass, $digit, $position, 1);
                }

            }
            $idx++;
        }
        return $pass;
    }
}



