<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * @var array|string[][]
     */
    protected array $roles = [
        [
            'name' => 'member',
        ],
        [
            'name' => 'moderator',
        ],
        [
            'name' => 'admin',
        ]
    ];

    /**
     * @return void
     */
    public function run(): void
    {
        Role::query()->insert($this->roles);
    }
}
