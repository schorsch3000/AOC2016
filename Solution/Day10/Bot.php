<?php

namespace AdventOfCode\Solution\Day10;


class Bot implements MicrochipReceiver
{

    /**
     * @var integer
     */
    protected $ID;
    /**
     * @var int
     */
    protected $microchip;
    /**
     * @var Bot
     */
    protected $lowerTarget;
    /**
     * @var Bot
     */
    protected $higherTarget;

    /**
     * @var callable
     */
    protected $compareObserver;

    /**
     * Bot constructor.
     * @param int $ID
     */


    public function __construct($ID)
    {
        $this->ID = $ID;
    }



    public function setCompareObserver(callable $compareObserver)
    {
        $this->compareObserver = $compareObserver;
    }

    public function addMicrochip($microchip)
    {
        if (is_null($this->microchip)) {
            $this->microchip = $microchip;

        } else {
            if(!is_null($this->compareObserver)){
                $observer=$this->compareObserver;
                $observer($this->microchip,$microchip,$this);
            }
            if ($this->microchip > $microchip) {
                $this->higherTarget->addMicrochip($this->microchip);
                $this->lowerTarget->addMicrochip($microchip);
            } else {
                $this->lowerTarget->addMicrochip($this->microchip);
                $this->higherTarget->addMicrochip($microchip);
            }
            $this->microchip = null;

        }

    }

    public function setLowerTarget(MicrochipReceiver $microchipReceiver)
    {
        $this->lowerTarget = $microchipReceiver;
    }

    public function setHigherTarget(MicrochipReceiver $microchipReceiver)
    {
        $this->higherTarget = $microchipReceiver;
    }

    public function getID()
    {
        return $this->ID;
    }

}
