#!/usr/bin/env php
<?php

declare(strict_types=1);

use App\Console\StartGameCommand;
use Symfony\Component\Console\Application;

require __DIR__ . '/../vendor/autoload.php';

$cli = new Application('Console');

$commands = [
    StartGameCommand::class,
];

foreach ($commands as $command) {
    $cli->add(new $command());
}

$cli->run();
