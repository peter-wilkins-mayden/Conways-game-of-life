<?php


class GameOfLife
{

    protected $cells = [];
    protected $matrix;


    /**
     * GameOfLife constructor.
     * @param array $cells
     */
    public function __construct($cells, $x_size, $y_size)
    {
        $this->cells = $cells;
        for ($x = 0; $x <= $x_size; ++ $x) {

            for ($y = 0; $y <= $y_size; ++ $y) {
                $this->matrix[$x][$y] = new Cell('dead', $x, $y);
            }
        }
    }


}
