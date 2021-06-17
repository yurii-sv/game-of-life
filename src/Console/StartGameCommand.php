<?php

declare(strict_types=1);

namespace App\Console;

use App\GameOfLife\Game;
use App\GameOfLife\GliderGrid;
use App\GameOfLife\GridInterface;
use App\GameOfLife\RandomGrid;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Helper\Table;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\ConsoleOutput;
use Symfony\Component\Console\Output\OutputInterface;

class StartGameCommand extends Command
{
    protected function configure(): void
    {
        $this
            ->setName('game:start')
            ->setDescription('Run the Game of Life')
            ->addOption(
                'rows',
                'r',
                InputOption::VALUE_OPTIONAL,
                '',
                '11'
            )
            ->addOption(
                'cols',
                'c',
                InputOption::VALUE_OPTIONAL,
                '',
                '11'
            )
            ->addOption(
                'grid',
                'g',
                InputOption::VALUE_OPTIONAL,
                'random or glider',
                'random'
            )
            ->addOption(
                'lifetime',
                'l',
                InputOption::VALUE_OPTIONAL,
                'how long play the Game of Life (in seconds)',
                '300'
            )
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        /** @psalm-var ConsoleOutput $output */
        $section = $output->section();
        $grid = $this->resolveGrid($input);
        $game = new Game($grid);
        $finishAt = time() + (int) $input->getOption('lifetime');

        while (true) {
            $table = new Table($section);
            $data = $game->process();
            foreach ($data as $item) {
                $table->addRow(array_map(static fn ($item) => $item ? '<bg=green;fg=green;options=bold>#</>' : ' ', $item));
            }
            $table->render();

            if (time() >= $finishAt) {
                break;
            }

            usleep(300 * 1000);
            $section->clear();
        }

        return 0;
    }

    private function resolveGrid(InputInterface $input): GridInterface
    {
        $rows = (int) $input->getOption('rows');
        $cols = (int) $input->getOption('cols');
        $gridName = $input->getOption('grid');

        if ($gridName === 'glider') {
            $grid = new GliderGrid($rows, $cols);
        } else {
            $grid = new RandomGrid($rows, $cols);
        }

        return $grid;
    }
}
