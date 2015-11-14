<?php


class GameOfLife
{
    protected $matrix ;
    protected $x_size;
    protected $y_size;
    /**
     * GameOfLife constructor.
     */
    public function __construct($x_size, $y_size)
    {
        $this->x_size = $x_size;
        $this->y_size = $y_size;

        for ($x = 0; $x <= $x_size; ++ $x) {

            for ($y = 0; $y <= $y_size; ++ $y) {
                $this->matrix[$x][$y] = '.';
            }
        }
    }

    public function printGrid()
    {
        $result = '';
        for ($x = 0; $x <= $this->x_size; ++ $x) {

                $result .= implode($this->matrix[$x]) . "\n";

            }
       return $result;
    }
    public function live($x, $y)
    {
        $this->matrix[$x][$y] = '*';
    }

}
