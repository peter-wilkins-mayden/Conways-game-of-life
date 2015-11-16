<?php

function tick(&$liveList)
{
    $newLiveList = [];
    $deadList = [];
    foreach ($liveList as $liveCell) {
        foreach (getNeighbours($liveCell) as $unknownCell) {
            if ( ! in_array($unknownCell, $newLiveList) && ! in_array($unknownCell, $deadList)) {
                if (shouldCellLive($liveList, $unknownCell[0], $unknownCell[1])) {

                    $newLiveList[] = $unknownCell;
                } else {
                    $deadList[] = $unknownCell;
                }
            }
        }
    }
    array_multisort($newLiveList);
    return $newLiveList;
}

function getNeighbours($liveCell)
{
    $x = $liveCell[0];
    $y = $liveCell[1];

    return [
        [$x - 1, $y - 1],
        [$x - 1, $y],
        [$x - 1, $y + 1],
        [$x, $y - 1],
        [$x, $y + 1],
        [$x + 1, $y - 1],
        [$x + 1, $y],
        [$x + 1, $y + 1],
    ];
}


function shouldCellLive(&$liveList, $x, $y)
{
    $alive = false;
    if (in_array([$x, $y], $liveList)) {
        $alive = true;
    }
    $liveNeighbours = 0;
    if (in_array([$x - 1, $y - 1], $liveList)) {
        $liveNeighbours += 1;
    }
    if (in_array([$x - 1, $y], $liveList)) {
        $liveNeighbours += 1;
    }
    if (in_array([$x - 1, $y + 1], $liveList)) {
        $liveNeighbours += 1;
    }
    if (in_array([$x, $y - 1], $liveList)) {
        $liveNeighbours += 1;
    }
    if (in_array([$x, $y + 1], $liveList)) {
        $liveNeighbours += 1;
    }
    if (in_array([$x + 1, $y - 1], $liveList)) {
        $liveNeighbours += 1;
    }
    if (in_array([$x + 1, $y], $liveList)) {
        $liveNeighbours += 1;
    }
    if (in_array([$x + 1, $y + 1], $liveList)) {
        $liveNeighbours += 1;
    }

    if ($alive && ($liveNeighbours == 2 || $liveNeighbours == 3) ||
        ( ! $alive && $liveNeighbours == 3)
    ) {
        $alive = true;
    } else {
        $alive = false;
    }

    return $alive;

}

