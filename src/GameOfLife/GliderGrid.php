<?php

declare(strict_types=1);

namespace App\GameOfLife;

class GliderGrid extends Grid
{
    /**
     * Glider:
     *   1 2 3
     * 1   #
     * 2     #
     * 3 # # #
     */
    protected function seed(): void
    {
        // Placed in the middle of the grid
        $startRow = (int) ceil(($this->rowsCount() - 3) / 2);
        $startCol = (int) ceil(($this->colsCount() - 3) / 2);

        $this->changeCellState($startRow, $startCol + 1, true);
        $this->changeCellState($startRow + 1, $startCol + 2, true);
        $this->changeCellState($startRow + 2, $startCol, true);
        $this->changeCellState($startRow + 2, $startCol + 1, true);
        $this->changeCellState($startRow + 2, $startCol + 2, true);
    }
}
