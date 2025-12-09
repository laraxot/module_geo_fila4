<?php

declare(strict_types=1);

use Rector\Config\RectorConfig;
<<<<<<< HEAD
use Rector\Set\ValueObject\LevelSetList;
use Rector\Set\ValueObject\SetList;

/*
 * Standard Rector Configuration for Laravel Modules
 *
 * Minimal configuration compatible with base Rector installation
 * Updated: 2025-11-24
 */
return static function (RectorConfig $rectorConfig): void {
    // Paths to analyze
    $rectorConfig->paths([
        __DIR__,
    ]);

    // Paths to skip
    $rectorConfig->skip([
        __DIR__.'/vendor',
        __DIR__.'/docs',
        __DIR__.'/tests/coverage',
    ]);

    // PHP version target
    $rectorConfig->phpVersion(Rector\ValueObject\PhpVersion::PHP_81);

    // Rule sets
    $rectorConfig->sets([
        // PHP 8.1 compatibility
        LevelSetList::UP_TO_PHP_81,

        // Code quality improvements
        SetList::CODE_QUALITY,
        SetList::DEAD_CODE,
        SetList::EARLY_RETURN,

        // Type declarations (commented - enable carefully)
        // SetList::TYPE_DECLARATION,

        // Coding style
        // SetList::CODING_STYLE,
    ]);

    // Import names for cleaner code
    $rectorConfig->importNames();

    // Import short classes
    $rectorConfig->importShortClasses(false);
=======
use Rector\PHPUnit\Set\PHPUnitLevelSetList;
use Rector\Set\ValueObject\LevelSetList;
use Rector\Set\ValueObject\SetList;
use RectorLaravel\Rector\MethodCall\RedirectRouteToToRouteHelperRector;
use RectorLaravel\Set\LaravelSetList;

return static function (RectorConfig $rectorConfig): void {
    $rectorConfig->paths([
        __DIR__.'/Modules',
        __DIR__.'/app',
        __DIR__.'/bootstrap',
        __DIR__.'/config',
        __DIR__.'/lang',
        __DIR__.'/public',
        __DIR__.'/resources',
        __DIR__.'/routes',
        __DIR__.'/tests',
    ]);

    // register a single rule
    // $rectorConfig->rule(InlineConstructorDefaultToPropertyRector::class);
    $rectorConfig->rule(RedirectRouteToToRouteHelperRector::class);

    // define sets of rules
    $rectorConfig->sets([
        PHPUnitLevelSetList::UP_TO_PHPUNIT_100,
        SetList::DEAD_CODE,
        SetList::CODE_QUALITY,
        LevelSetList::UP_TO_PHP_81,
        LaravelSetList::LARAVEL_100,
        SetList::DEAD_CODE,
        SetList::NAMING,
        SetList::TYPE_DECLARATION,
        SetList::CODING_STYLE,
        SetList::PRIVATIZATION,
        SetList::EARLY_RETURN,
        SetList::INSTANCEOF,
    ]);

    $rectorConfig->skip([
        // testdummy files
        '*/docs',
        '*/vendor',
    ]);

    $rectorConfig->importNames();
>>>>>>> be08416 (.)
};
