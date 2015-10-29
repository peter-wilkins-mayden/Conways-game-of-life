<?php

namespace spec;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class GameOfLifeSpec extends ObjectBehavior
{
    function a_cell_is_either_alive_or_dead()
    {
        $alive = new Cell('alive', 2, 4);
        $dead = new Cell('dead', 2, 5);
        $game = new GameOfLife([$alive, $dead]);
        expect($game->alive->status())->toBe('alive');
        expect($game->dead->status())->toBe('dead');
    }
    function game_of_life_prints_a_two_dimensional_array_of_dots_if_all_cells_are_dead()
    {
        $game= new GameOfLife([], 4, 8);
        expect($game->print())->toBe("........\n........\n........\n........\n");

    }
}
