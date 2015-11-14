<?php

namespace spec;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class GameOfLifeSpec extends ObjectBehavior
{
//    function it_has_cells_that_are_either_alive_or_dead()
//    {
//        $alive = new Cell('alive', 2, 4);
//        $dead = new Cell('dead', 2, 5);
//        $ = new GameOfLife([$alive, $dead]);
//        expect($game->alive->status())->toBe('alive');
//        expect($game->dead->status())->toBe('dead');
//    }
    function it_prints_a_two_dimensional_array_of_dots_if_all_cells_are_dead()
    {
        $this->beConstructedWith(4, 8);
        $this->printGrid()->shouldBe("........\n........\n........\n........\n");

    }
    function it_knows_if_a_cell_is_live_or_dead()
    {
        $this->beConstructedWith(4, 8);
        $this->live(2, 4);
        $this->printGrid()->shouldBe("........\n...*....\n........\n........\n");

    }
//    function it_can_change_a_cell_from_dead_to_live()
//    {
//        $this->live()
//    }
}
