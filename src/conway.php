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

    $neighbours = [
        [$x - 1, $y - 1],
        [$x - 1, $y],
        [$x - 1, $y + 1],
        [$x, $y - 1],
        [$x, $y + 1],
        [$x + 1, $y - 1],
        [$x + 1, $y],
        [$x + 1, $y + 1],
    ];

    return $neighbours;
}


function shouldCellLive(&$liveList, $x, $y)
{
    $alive = false;
    if (in_array([$x, $y], $liveList)) {
        $alive = true;
    }
    $neighbours = getNeighbours([$x, $y]);
    $liveNeighbours = 0;
    foreach ($neighbours as $coord) {
        if (in_array($coord, $liveList)) {
            $liveNeighbours += 1;
        }
    }
    if ($alive && ($liveNeighbours == 2 || $liveNeighbours == 3) ||
        ( ! $alive && $liveNeighbours == 3)
    ) {
        return true;
    }
    return false;
}

