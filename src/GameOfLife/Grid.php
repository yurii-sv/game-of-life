<?php

declare(strict_types=1);

namespace App\GameOfLife;

use Webmozart\Assert\Assert;

abstract class Grid implements GridInterface
{
    /**
     * @var bool[][]
     */
    protected array $state;
    protected int $rows;
    protected int $cols;

    public function __construct(int $rows, int $cols)
    {
        Assert::greaterThan($rows, 4);
        Assert::greaterThan($cols, 4);
        $this->rows = $rows;
        $this->cols = $cols;

        $this->createState();
        $this->seed();
    }


    public function state(): array
    {
        return $this->state;
    }

    public function changeCellState(int $rowIndex, int $colIndex, bool $value): void
    {
        Assert::keyExists($this->state, $rowIndex);
        Assert::keyExists($this->state[$rowIndex], $colIndex);

        $this->state[$rowIndex][$colIndex] = $value;
    }

    public function rowsCount(): int
    {
        return $this->rows;
    }

    public function colsCount(): int
    {
        return $this->cols;
    }

    protected function createState(): void
    {
        $row = array_fill(0, $this->colsCount(), false);
        $this->state = array_fill(0, $this->rowsCount(), $row);
    }

    abstract protected function seed(): void;
}
