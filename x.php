<?php

class ConstructionGame 
{
    public function __construct(int $length, int $width) 
    {
        // Write the code that goes here
    }

    public function addCubes(array $cubes) : void
    {
        // Write the code that goes here
    }

    public function getHeight() : int  
    {
        // Write the code that goes here
        return -1;
    }
}

$game = new ConstructionGame(2, 2);

$game->addCubes([
    [true, true],
    [false, false]
]);
$game->addCubes([
    [true, true],
    [false, true]
]);
echo $game->getHeight() . "\n"; // should print 2

$game->addCubes([
    [false, false],
    [true, true]
]);
echo $game->getHeight() . "\n"; // should print 1