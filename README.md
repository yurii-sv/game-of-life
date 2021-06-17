# Game of Life
## Definition
The universe of the Game of Life is an infinite two-dimensional orthogonal grid of square cells, each of which is in one of two possible states, alive or dead. Every cell interacts with its eight neighbors, which are the cells that are horizontally, vertically, or diagonally adjacent.

## Rules
At each step in time, the following transitions occur:
- Any live cell with fewer than two live neighbors dies as if caused by underpopulation.
- Any live cell with two or three live neighbors lives on to the next generation.
- Any live cell with more than three live neighbors dies, as if by overcrowding.
- Any dead cell with exactly three live neighbors becomes a live cell, as if by reproduction.

The initial pattern constitutes the seed of the system. The first generation is created by applying the above rules simultaneously to every cell in the seed—births and deaths occur simultaneously, and the discrete moment at which this happens is sometimes called a tick (in other words, each generation is a pure function of the preceding one). The rules continue to be applied repeatedly to create further generations.

## Install
```bash
git clone https://github.com/yurii-sv/game-of-life.git
cd ./game-of-life
composer install --no-dev
```
## Run
```bash
cd ./game-of-life
php ./bin/app.php game:start
php ./bin/app.php game:start --rows 25 --cols 25 --grid glider --lifetime 120
```
