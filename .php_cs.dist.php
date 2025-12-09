<?php

declare(strict_types=1);

<<<<<<< HEAD
use PhpCsFixer\Config;
use PhpCsFixer\Finder\Finder;

$finder = Finder::create()
=======

$finder = Symfony\Component\Finder\Finder::create()
>>>>>>> be08416 (.)
    ->in([
        __DIR__ . '/src',
        __DIR__ . '/tests',
    ])
    ->name('*.php')
    ->notName('*.blade.php')
    ->ignoreDotFiles(true)
    ->ignoreVCS(true);

<<<<<<< HEAD
return (new Config())->setRules([
=======
return new PhpCsFixer\Config()->setRules([
>>>>>>> be08416 (.)
    '@PSR12' => true,
    'array_syntax' => ['syntax' => 'short'],
    'ordered_imports' => ['sort_algorithm' => 'alpha'],
    'no_unused_imports' => true,
    'not_operator_with_successor_space' => true,
    'trailing_comma_in_multiline' => true,
    'phpdoc_scalar' => true,
    'unary_operator_spaces' => true,
    'binary_operator_spaces' => true,
    'blank_line_before_statement' => [
        'statements' => ['break', 'continue', 'declare', 'return', 'throw', 'try'],
    ],
    'phpdoc_single_line_var_spacing' => true,
    'phpdoc_var_without_name' => true,
    'class_attributes_separation' => [
        'elements' => [
            'method' => 'one',
        ],
    ],
    'method_argument_space' => [
        'on_multiline' => 'ensure_fully_multiline',
        'keep_multiple_spaces_after_comma' => true,
    ],
<<<<<<< HEAD
=======
    ,
>>>>>>> be08416 (.)
    'braces' => [
        'position_after_functions_and_oop_constructs' => 'same',
    ],
    'single_trait_insert_per_statement' => true,
<<<<<<< HEAD
])->setFinder($finder);
=======
])->setFinder($finder);
>>>>>>> be08416 (.)
