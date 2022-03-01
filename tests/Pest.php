<?php

declare(strict_types=1);

use Illuminate\Foundation\Testing\LazilyRefreshDatabase;
use Tests\TestCase;

uses(TestCase::class, LazilyRefreshDatabase::class)->in('Feature');


expect()->extend('toBeOne', function () {
    return $this->toBe(1);
});

