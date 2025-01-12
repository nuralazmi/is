<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role as SpatieRole;
use App\Enums\RoleNames;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        foreach (RoleNames::cases() as $role) {
            SpatieRole::query()->firstOrCreate(
                ['name' => $role->value, 'guard_name' => 'web'],
                ['name' => $role->value, 'guard_name' => 'web'],
            );
        }
    }
}
