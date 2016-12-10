<?php

namespace AdventOfCode\Solution\Day10;


class BotManager
{
    /**
     * @var Bot[]
     */
    protected $bots = [];
    /**
     * @var Output[]
     */
    protected $outputs = [];

    protected $compares = [];

    public function addBotHighAction($botId, $highTarget)
    {
        $this->ensureBot($botId);
        $this->ensureBot($highTarget);
        $this->bots[$botId]->setHigherTarget($this->bots[$highTarget]);
    }

    public function addBotLowAction($botId, $lowTarget)
    {
        $this->ensureBot($botId);
        $this->ensureBot($lowTarget);
        $this->bots[$botId]->setLowerTarget($this->bots[$lowTarget]);
    }

    public function addOutputHighAction($botId, $highTarget)
    {
        $this->ensureBot($botId);
        $this->ensureOutput($highTarget);
        $this->bots[$botId]->setHigherTarget($this->outputs[$highTarget]);
    }

    public function addOutputLowAction($botId, $lowerTarget)
    {
        $this->ensureBot($botId);
        $this->ensureOutput($lowerTarget);
        $this->bots[$botId]->setLowerTarget($this->outputs[$lowerTarget]);
    }




    public function addValueToBot($botId, $value)
    {
        $this->bots[$botId]->addMicrochip($value);
    }

    protected function ensureOutput($outputId)
    {
        if (isset($this->outputs[$outputId])) {
            return;
        }
        $this->outputs[$outputId]=new Output();
    }

    protected function ensureBot($botId)
    {
        if (isset($this->bots[$botId])) {
            return;
        }
        $bot = new Bot($botId);
        $bot->setCompareObserver(function ($chip1, $chip2, Bot $bot) {
            $chips = func_get_args();
            sort($chips);
            $this->compares[$chips[0]][$chips[1]] = $bot->getID();
        });
        $this->bots[$botId] = $bot;
    }

    /**
     * @return array
     */
    public function getCompares()
    {
        return $this->compares;
    }

    /**
     * @return Output[]
     */
    public function getOutputs()
    {
        return $this->outputs;
    }


}