<?php

declare(strict_types=1);

namespace Test\Feature;

use App\GameOfLife\Game;
use App\GameOfLife\GliderGrid;
use PHPUnit\Framework\TestCase;

class GameTest extends TestCase
{
    public function testGliderPattern(): void
    {
        $expectedStateG1 = [
            [false, false, false, false, false],
            [false, false, true, false, false],
            [false, false, false, true, false],
            [false, true, true, true, false],
            [false, false, false, false, false]
        ];
        $expectedStateG2 = [
            [false, false, false, false, false],
            [false, false, false, false, false],
            [false, true, false, true, false],
            [false, false, true, true, false],
            [false, false, true, false, false]
        ];
        $expectedStateG3 = [
            [false, false, false, false, false],
            [false, false, false, false, false],
            [false, false, false, true, false],
            [false, true, false, true, false],
            [false, false, true, true, false]
        ];

        $game = new Game(new GliderGrid(5, 5));

        self::assertEquals($expectedStateG1, $game->process());
        self::assertEquals($expectedStateG2, $game->process());
        self::assertEquals($expectedStateG3, $game->process());
    }
}
