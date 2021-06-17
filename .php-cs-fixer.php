<?php

use PhpCsFixer\Config;
use PhpCsFixer\Finder;

$finder = Finder::create()
    ->files()
    ->in(
        [
            __DIR__ . '/src',
            __DIR__ . '/tests',
            __DIR__ . '/bin',
        ]
    )
    ->name('*.php')
    ->ignoreDotFiles(true)
    ->ignoreVCS(true);

$rules = [
    '@PSR12'                            => true,
    'array_syntax'                      => ['syntax' => 'short'],
    'binary_operator_spaces'            => [
        'default'   => 'single_space',
        'operators' => [
            '=>' => 'align',
            '|'  => 'no_space',
        ],
    ],
    'concat_space'                      => ['spacing' => 'one'],
    'cast_spaces'                       => ['space' => 'single'],
    'no_blank_lines_after_phpdoc'       => true,
    'no_empty_phpdoc'                   => true,
    'ternary_operator_spaces'           => true,
    'unary_operator_spaces'             => true,
    'not_operator_with_successor_space' => true,
];

return (new Config())
    ->setFinder($finder)
    ->setRules($rules)
    ->setRiskyAllowed(true)
    ->setUsingCache(true)
    ->setCacheFile(__DIR__ . '/var/cache/.php_cs.cache');
