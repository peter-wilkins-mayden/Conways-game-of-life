<?php
/**
 * Project: Conways-game-of-life
 * User: peterwilkins
 * Date: 11/11/2015
 * Time: 12:46
 */


include_once '../src/conway.php';


class ConwayTest extends \PHPUnit_Framework_TestCase
{

    public function test_alive_with_0_live_neighbours_should_die()
    {
        $liveList = [[1, 1],];
        $this->assertEquals(false, shouldCellLive($liveList, 1, 1));
    }

    public function test_alive_with_1_live_neighbours_should_die()
    {
        $liveList = [[1, 1], [1, 0],];
        $this->assertEquals(false, shouldCellLive($liveList, 1, 1));
    }

    public function test_alive_with_2_live_neighbours_should_live()
    {
        $liveList = [[1, 1], [1, 0], [1, 2],];
        $this->assertEquals(true, shouldCellLive($liveList, 1, 1));
    }


    public function test_alive_with_3_live_neighbours_live()
    {
        $liveList = [[1, 1], [1, 0], [1, 2], [2, 2],];
        $this->assertEquals(true, shouldCellLive($liveList, 1, 1));
    }

    public function test_alive_with_4_live_neighbours_should_die()
    {
        $liveList = [[1, 1], [1, 0], [1, 2], [2, 2], [0, 0],];
        $this->assertEquals(false, shouldCellLive($liveList, 1, 1));
    }

    public function test_dead_with_1_live_neighbours_should_stay_dead()
    {
        $liveList = [[0, 0],];
        $this->assertEquals(false, shouldCellLive($liveList, 1, 1));
    }

    public function test_dead_with_2_live_neighbours_should_stay_dead()
    {
        $liveList = [[0, 0], [1, 1],];
        $this->assertEquals(false, shouldCellLive($liveList, 1, 1));
    }

    public function test_dead_with_3_live_neighbours_should_live()
    {
        $liveList = [[1, 0], [1, 2], [2, 2],];
        $this->assertEquals(true, shouldCellLive($liveList, 1, 1));
    }
    public function test_dead_with_4_live_neighbours_should_stay_dead()
    {
        $liveList = [[0, 0], [1, 0], [1, 2], [2, 2],];
        $this->assertEquals(false, shouldCellLive($liveList, 1, 1));
    }

    public function test_tick_returns_new_liveList()
    {
        $liveList = [[1, 1], [1, 0], [1, 2],];
        $this->assertEquals([[0, 1], [1, 1], [2, 1],], tick($liveList));
    }
    public function test_tick_returns_new_liveList2()
    {
        $liveList = [[0, 0], [0, 2], [2, 0],];
        $this->assertEquals([[1, 1],], tick($liveList));
    }
    public function test_get_neighbours()
    {
        $this->assertEquals([[4,4],[4,5],[4,6],[5,4],[5,6],[6,4],[6,5],[6,6],], getNeighbours([5,5]));
    }
}