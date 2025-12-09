<?php

declare(strict_types=1);

namespace Modules\Geo\Filament\Blocks;

use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Modules\Xot\Actions\View\GetViewsSiblingsAndSelfAction;

// use Modules\Blog\Models\Article;

class MapBlock
{
<<<<<<< HEAD
    public static function make(string $name = 'map', string $context = 'form'): Block
    {
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
    public static function make(string $name = 'map', string $context = 'form'): Block
    {
=======
=======
>>>>>>> origin/develop
    public static function make(
        string $name = 'map',
        string $context = 'form',
    ): Block {
<<<<<<< HEAD
>>>>>>> a12f125f4a (.)
=======
    public static function make(string $name = 'map', string $context = 'form'): Block
    {
>>>>>>> b93ef594b4 (.)
=======
>>>>>>> origin/develop
>>>>>>> f0b4f5c (.)
        $view = 'geo::components.blocks.map.location-map-table';
        $views = app(GetViewsSiblingsAndSelfAction::class)->execute($view);

        return Block::make($name)
            ->schema([
                /*
<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> b93ef594b4 (.)
>>>>>>> f0b4f5c (.)
                 * Select::make('article_id')
                 * ->label('Article')
                 * ->options(Article::published()->orderBy('title')->pluck('title', 'id'))
                 * ->required(),
                 */
                TextInput::make('text')->label('Link text (optional)'),
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
=======
>>>>>>> origin/develop
                Select::make('article_id')
                    ->label('Article')
                    ->options(Article::published()->orderBy('title')->pluck('title', 'id'))
                    ->required(),
                */
                TextInput::make('text')
                    ->label('Link text (optional)'),
<<<<<<< HEAD
>>>>>>> a12f125f4a (.)
=======
>>>>>>> b93ef594b4 (.)
=======
>>>>>>> origin/develop
>>>>>>> f0b4f5c (.)
                Select::make('_tpl')
                    ->label('layout')
                    ->options($views)
                    ->default('v1')
                    ->required(),
            ])
            ->label('Map')
            ->columns('form' === $context ? 2 : 1);
    }
}
