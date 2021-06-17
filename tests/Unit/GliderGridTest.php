<?php

declare(strict_types=1);

namespace Test\Unit;

use App\GameOfLife\GliderGrid;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;

class GliderGridTest extends TestCase
{
    public function testSuccessfulCreated(): void
    {
        $expectedState = [
            [false, false, false, false, false],
            [false, false, true, false, false],
            [false, false, false, true, false],
            [false, true, true, true, false],
            [false, false, false, false, false]
        ];
        $grid = new GliderGrid(5, 5);

        self::assertEquals($expectedState, $grid->state());
    }

    public function testSuccessfulChangedState(): void
    {
        $expectedState = [
            [false, false, false, false, false],
            [false, false, false, false, false],
            [false, false, false, true, false],
            [false, true, true, true, false],
            [false, false, false, false, false]
        ];
        $grid = new GliderGrid(5, 5);
        $grid->changeCellState(1, 2, false);

        self::assertEquals($expectedState, $grid->state());
    }

    public function testInvalidValueAtCreation(): void
    {
        $this->expectException(InvalidArgumentException::class);
        new GliderGrid(4, 4);
    }

    public function testInvalidChangeCellState(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $grid = new GliderGrid(5, 5);
        $grid->changeCellState(5, 2, false);
    }
}
