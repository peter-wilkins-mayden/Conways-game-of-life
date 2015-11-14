<?php
/**
 * Project: Conways-game-of-life
 * User: peterwilkins
 * Date: 11/11/2015
 * Time: 12:46
 */


include_once '../src/conway.php';
include_once '../src/Grid.php';


class ConwayTest extends \PHPUnit_Framework_TestCase
{

    public function test_live_with_0_live_cells_should_die()
    {
        $cell = new Cell(true);
        $this->assertEquals(false, $cell->setNewState(0));
    }

    public function test_live_with_2_live_cells_should_live()
    {
        $cell = new Cell(true);
        $this->assertEquals(true, $cell->setNewState(2));
    }

    public function test_live_with_4_live_cells_should_die()
    {
        $cell = new Cell(true);
        $this->assertEquals(false, $cell->setNewState(4));
    }

    public function test_dead_with_3_live_cells_should_live()
    {
        $cell = new Cell(false);
        $this->assertEquals(true, $cell->setNewState(3));
    }

    public function test_dead_with_1_live_cells_should_dead()
    {
        $cell = new Cell(false);
        $this->assertEquals(false, $cell->setNewState(1));
    }

    public function test_live_with_3_live_cells_should_live()
    {
        $cell = new Cell(true);
        $this->assertEquals(true, $cell->setNewState(3));
    }

    public function test_live_with_1_should_die()
    {
        $cell = new Cell(true);
        $this->assertEquals(false, $cell->setNewState(1));
    }

    public function test_number_of_live_neighbours_is_0()
    {
        $grid = new Grid([
            [0, 0, 0,],
            [0, 1, 0,],
            [0, 0, 0,],
        ]);
        $this->assertEquals(0, $grid->liveNeighbours(1, 1));
    }

    public function test_number_of_live_neighbours_is_2()
    {
        $grid = new Grid([
            [1, 0, 1,],
            [0, 0, 0,],
            [0, 0, 0,],
        ]);
        $this->assertEquals(2, $grid->liveNeighbours(1, 1));
    }

    public function test_eight_neighbours()
    {

        $grid = new Grid([
            [1, 1, 1,],
            [1, 0, 1,],
            [1, 1, 1,],
        ]);
        $this->assertEquals(8, $grid->liveNeighbours(1, 1));
    }

    public function test_tick()
    {

        $grid = new Grid([
            [0, 1, 0,],
            [0, 1, 0,],
            [0, 1, 0,],
        ]);
        $this->assertEquals([
            [0, 1, 0,],
            [0, 1, 0,],
            [0, 1, 0,],
        ], $grid->tick());
    }




    //    public function test_live_cell_should_live()
//    {
//        $this->assertEquals(true, getNewState(2));
//    }
    //public function test_dead_cell_wi
}
