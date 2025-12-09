<?php

declare(strict_types=1);

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Geo\Database\Factories\RegionFactory;
use Modules\Geo\Models\BaseModel;
use Modules\Geo\Models\Region;
use Sushi\Sushi;

describe('Region Business Logic', function (): void {
    test('region extends base model', function (): void {
        expect(Region::class)->toBeSubclassOf(BaseModel::class);
    });

    test('region has factory trait for testing', function (): void {
        $traits = class_uses(Region::class);

        expect($traits)->toHaveKey(HasFactory::class);
    });

    test('region uses sushi trait for in-memory data', function (): void {
        $traits = class_uses(Region::class);

        expect($traits)->toHaveKey(Sushi::class);
    });

    test('region has correct key type configured', function (): void {
        $region = new Region;

        expect($region->getKeyType())->toBe('integer');
    });

    test('region has schema definition for geographic data', function (): void {
        $region = new Region;

        expect($region)->toHaveProperty('schema');
        expect($region->schema['id'])->toBe('integer');
        expect($region->schema['name'])->toBe('string');
    });

    test('region has factory class configured', function (): void {
        expect(Region::$factory)->toBe(RegionFactory::class);
    });

    test('region model can be instantiated without errors', function (): void {
        $region = new Region;

        expect($region)->toBeInstanceOf(Region::class);
        expect($region)->toBeInstanceOf(BaseModel::class);
    });

    test('region can be queried by name', function (): void {
        $query = Region::whereName('Lombardia');

        expect($query)->toBeInstanceOf(Builder::class);
    });

    test('region can be queried by id', function (): void {
        $query = Region::whereId(1);

        expect($query)->toBeInstanceOf(Builder::class);
    });
});
