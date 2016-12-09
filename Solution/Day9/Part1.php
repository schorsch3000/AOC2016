<?php
namespace AdventOfCode\Solution\Day9;
class Part1
{
    protected $input;

    public function __construct($input)
    {
        $this->input = $input;
    }

    public function solve()
    {
        return $this->getDecompressedLength($this->input, false);
    }

    public function getDecompressedLength($compressed, $recursive)
    {
        $fp = fopen('php://memory', 'r+');
        fwrite($fp, $compressed);
        rewind($fp);
        $length = 0;
        while (!feof($fp)) {
            while ("(" !== fread($fp, 1)) {
                if (feof($fp)) {
                    break 2;
                }
                $length++;
            }
            $sectionLength = '';
            $sectionTimes = '';
            while (!feof($fp) && "x" !== $char = fread($fp, 1)) {
                $sectionLength .= $char;
            }
            while (!feof($fp) && ")" !== $char = fread($fp, 1)) {
                $sectionTimes .= $char;
            }
            if ($recursive) {
                $section = fread($fp, $sectionLength);
                $length += $this->getDecompressedLength($section, $recursive) * $sectionTimes;
            } else {
                $length += $sectionTimes * $sectionLength;
                fseek($fp, $sectionLength, SEEK_CUR);
            }
        }
        fclose($fp);
        return $length;
    }
}
