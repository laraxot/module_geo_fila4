<?php

declare(strict_types=1);
use function Safe\class_uses;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Geo\Models\BaseModel;
use Modules\Geo\Models\Province;
use Sushi\Sushi;

describe('Province Business Logic', function (): void {
    test('province extends base model', function (): void {
        expect(Province::class)->toBeSubclassOf(BaseModel::class);
    });

    test('province has factory trait for testing', function (): void {
        $traits = class_uses(Province::class);

        expect($traits)->toHaveKey(HasFactory::class);
    });

    test('province uses sushi trait for in-memory data', function (): void {
        $traits = class_uses(Province::class);

        expect($traits)->toHaveKey(Sushi::class);
    });

    test('province has schema definition for geographic hierarchy', function (): void {
        $province = new Province;

        expect($province)->toHaveProperty('schema');
        expect($province->schema['region_id'])->toBe('integer');
        expect($province->schema['id'])->toBe('integer');
        expect($province->schema['name'])->toBe('string');
    });

    test('province can get rows from comune data', function (): void {
        $province = new Province;

        expect(method_exists($province, 'getRows'))->toBeTrue();
        expect($province->getRows())->toBeArray();
    });

    test('province model can be instantiated without errors', function (): void {
        $province = new Province;

        expect($province)->toBeInstanceOf(Province::class);
        expect($province)->toBeInstanceOf(BaseModel::class);
    });

    test('province can be queried by name', function (): void {
        $query = Province::whereName('Milano');

        expect($query)->toBeInstanceOf(Builder::class);
    });

    test('province can be queried by region id', function (): void {
        $query = Province::whereRegionId(1);

        expect($query)->toBeInstanceOf(Builder::class);
    });
});
