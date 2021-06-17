<?php

namespace App\GameOfLife;

interface GridInterface
{
    public function state(): array;
    public function changeCellState(int $rowIndex, int $colIndex, bool $value): void;
    public function rowsCount(): int;
    public function colsCount(): int;
}
