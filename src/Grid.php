<?php


class Grid
{

    public $grid;

    /**
     * Grid constructor.
     * @param $grid
     */
    public function __construct($grid)
    {
        for ($x = 0; $x<count($grid); $x++) {
            for ($y = 0; $y<count($grid[$x]); $y++) {
                $this->grid[$x][$y] = new Cell($grid[$x][$y]);
            }
        }
    }

    public function tick()
    {

        for ($x = 0; $x<count($this->grid); $x++) {
            for ($y = 0; $y<count($this->grid[$x]); $y++) {
               $printGrid[$x][$y] = $this->grid[$x][$y]->setNewState($this->liveNeighbours($x, $y));
                $this->grid[$x][$y]->tick();
            }
        }
        return $printGrid;
    }

    public function liveNeighbours($x, $y)
    {
        $count = 0;
        foreach ($this->grid as $line) {
            foreach ($line as $cell) {
                $count += $cell->getState();
            }
        }
        if ($this->grid[$x][$y]->getState()) {
            $count -= 1;
        }

        return $count;
    }
}