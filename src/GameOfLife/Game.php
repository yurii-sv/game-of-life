<?php

declare(strict_types=1);

namespace App\GameOfLife;

class Game
{
    public function __construct(private GridInterface $grid)
    {
    }

    /**
     * @psalm-return bool[][]
     */
    public function process(): array
    {
        /** @psalm-var bool[][] */
        $currentState = $this->grid->state();
        $cols = $this->grid->colsCount();
        $rows = $this->grid->rowsCount();

        for ($currentRowIndex = 0; $currentRowIndex < $rows; $currentRowIndex++) {
            for ($currentColIndex = 0; $currentColIndex < $cols; $currentColIndex++) {
                $currentCell = $currentState[$currentRowIndex][$currentColIndex];
                $neighbors = $this->countNeighbors($currentState, $currentRowIndex, $currentColIndex);

                if (! $currentCell && $neighbors === 3) {
                    $this->grid->changeCellState($currentRowIndex, $currentColIndex, true);
                } elseif ($currentCell && ($neighbors < 2 || $neighbors > 3)) {
                    $this->grid->changeCellState($currentRowIndex, $currentColIndex, false);
                }
            }
        }

        return $currentState;
    }

    private function countNeighbors(array $generationState, int $rowIndex, int $colIndex): int
    {
        $sum = 0;
        $cols = $this->grid->colsCount();
        $rows = $this->grid->rowsCount();

        for ($i = -1; $i < 2; $i++) {
            for ($j = -1; $j < 2; $j++) {
                $row = ($rowIndex + $i + $rows) % $rows;
                $col = ($colIndex + $j + $cols) % $cols;
                /** @psalm-var bool[][] $generationState */
                $sum += (int) $generationState[$row][$col];
            }
        }
        $sum -= (int) $generationState[$rowIndex][$colIndex];

        return $sum;
    }
}
