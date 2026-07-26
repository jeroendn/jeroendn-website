<?php

declare(strict_types=1);

use PhpCsFixer\Config;
use PhpCsFixer\Finder;

// (new ...) wrapping instead of SSD's `new Config()->` chaining: that syntax
// needs PHP 8.4+, this container runs 8.3.
return (new Config())
    ->setRiskyAllowed(false)
    ->setCacheFile(__DIR__ . '/tmp/cs-fixer')
    ->setRules([
        '@auto' => true, // @PER-CS + PHP migration level from composer.json
    ])
    ->setFinder(
        (new Finder())
            ->in(__DIR__ . '/app')
            ->in(__DIR__ . '/config')
            ->in(__DIR__ . '/database')
            ->in(__DIR__ . '/routes')
            ->in(__DIR__ . '/tests')
            ->name('*.php')
            ->append([
                __FILE__, // Include this config file itself
                __DIR__ . '/artisan',
                __DIR__ . '/bootstrap/app.php',
                __DIR__ . '/public/index.php',
                __DIR__ . '/server.php',
            ]),
    );
