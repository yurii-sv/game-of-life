<?php

declare(strict_types=1);

namespace App\GameOfLife;

class RandomGrid extends Grid
{
    protected function seed(): void
    {
        $iteration = (int) round(($this->rowsCount() * $this->colsCount()) / 2);
        for ($i = 0; $i < $iteration; $i++) {
            $rowIndex = random_int(0, $this->rowsCount() - 1);
            $colIndex = random_int(0, $this->colsCount() - 1);
            $value = (bool) random_int(0, 1);

            $this->changeCellState($rowIndex, $colIndex, $value);
        }
    }
}
