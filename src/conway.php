<?php

/**
 * Project: Conways-game-of-life
 * User: peterwilkins
 * Date: 11/11/2015
 * Time: 13:41
 */
class Cell
{

    public $state;
    public $newState;

    /**
     * Cell constructor.
     * @param $state
     */
    public function __construct($state)
    {
        $this->state = $state;
    }

    public function setNewState($liveNeighbours)
    {
        if (($this->state && ($liveNeighbours == 2 || $liveNeighbours == 3)) ||
            ( ! $this->state && $liveNeighbours == 3)
        ) {
            $this->newState = true;

            return true;
        } else {
            $this->newState = false;
        }

        return $this->newState;

    }

    /**
     * @return mixed
     */
    public function getState()
    {
        return $this->state;
    }

    public function tick()
    {
        $this->state = $this->newState;
    }


}