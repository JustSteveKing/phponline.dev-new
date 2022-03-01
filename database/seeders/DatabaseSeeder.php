<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        if (! app()->environment('production')) {
            Category::factory(12)->create();
        }

        $this->call(
            RoleSeeder::class,
        );
    }
}
