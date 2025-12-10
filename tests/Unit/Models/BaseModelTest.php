<?php

declare(strict_types=1);

<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> f0b4f5c (.)
namespace Modules\Geo\Tests\Unit\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Modules\Geo\Models\BaseModel;
<<<<<<< HEAD
=======
=======
namespace Modules\Geo\Tests\Unit\Models;

use Modules\Geo\Models\BaseModel;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Database\Eloquent\Model;
>>>>>>> origin/develop
use Tests\TestCase;

uses(TestCase::class, RefreshDatabase::class);

beforeEach(function () {
    $this->baseModel = new class extends BaseModel {
<<<<<<< HEAD
=======
=======
namespace Modules\Geo\Tests\Unit\Models;

>>>>>>> b93ef594b4 (.)
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Modules\Geo\Models\BaseModel;
>>>>>>> f0b4f5c (.)
use Tests\TestCase;

uses(TestCase::class, RefreshDatabase::class);

beforeEach(function () {
<<<<<<< HEAD
    $this->baseModel = new class extends BaseModel {
=======
<<<<<<< HEAD
    $this->baseModel = new class() extends BaseModel
    {
>>>>>>> a12f125f4a (.)
=======
    $this->baseModel = new class extends BaseModel {
>>>>>>> b93ef594b4 (.)
=======
>>>>>>> origin/develop
>>>>>>> f0b4f5c (.)
        protected $table = 'test_geo_table';
    };
});

test('base model extends eloquent model', function () {
    expect($this->baseModel)->toBeInstanceOf(Model::class);
});

test('base model has correct table name', function () {
    expect($this->baseModel->getTable())->toBe('test_geo_table');
});

test('base model can be instantiated', function () {
    expect($this->baseModel)->toBeInstanceOf(BaseModel::class);
});

test('base model has proper inheritance chain', function () {
    expect($this->baseModel)->toBeInstanceOf(BaseModel::class);
    expect($this->baseModel)->toBeInstanceOf(Model::class);
});

test('base model has timestamps enabled', function () {
    expect($this->baseModel->usesTimestamps())->toBeTrue();
});
