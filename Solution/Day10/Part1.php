<?php
namespace AdventOfCode\Solution\Day10;

class Part1
{
    protected $input;

    /**
     * @var BotManager
     */
    protected $botManager;

    public function __construct($input)
    {
        $this->input = explode("\n", $input);
        sort($this->input);
        $this->botManager=new BotManager();
    }

    public function run()
    {

        foreach ($this->input as $row) {
            if (preg_match('/^bot (\d+) gives low to (output|bot) (\d+) and high to (output|bot) (\d+)$/', $row,
                $match)) {
                if ($match[2] === 'bot') {
                    $this->botManager->addBotLowAction($match[1], $match[3]);
                } else {
                    $this->botManager->addOutputLowAction($match[1], $match[3]);
                }
                if ($match[4] === 'bot') {
                    $this->botManager->addBotHighAction($match[1], $match[5]);
                } else {
                    $this->botManager->addOutputHighAction($match[1], $match[5]);
                }
                continue;
            }
            if (preg_match('/^value (\d+) goes to bot (\d+)$/', $row,
                $match)) {
                $this->botManager->addValueToBot($match[2], $match[1]);
            } else {
                echo "mallformed row: $row";
            }
        }
    }

    public function solve()
    {
        $this->run();
        return $this->botManager->getCompares()[17][61];

    }
}
