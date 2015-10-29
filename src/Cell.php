<?php

/**
 * Project: Conways-game-of-life
 * User: peterwilkins
 * Date: 29/10/2015
 * Time: 06:17
 */
class Cell
{

    protected $status;
    protected $x;
    Protected $y;

    /**
     * @return mixed
     */
    public function status()
    {
        return $this->status;
    }

    /**
     * Cell constructor.
     * @param $status
     * @param $x
     * @param $y
     */
    public function __construct($status, $x, $y)
    {
        $this->status = $status;
        $this->x = $x;
        $this->y = $y;
    }
}