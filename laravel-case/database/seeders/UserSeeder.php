<?php

namespace Database\Seeders;

use App\Enums\RoleNames;
use App\Models\Order;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * @return void
     */
    public function run(): void
    {
        $json = file_get_contents(database_path('seeders/data/customers.json'));
        $customers = json_decode($json, true);

        $customers = array_map(function ($product) {
            unset($product['since']);
            unset($product['id']);

            $product['role'] = RoleNames::CUSTOMER->value;

            return $product;
        }, $customers);
        $users = [
            ['name' => 'Azmi Nural', 'revenue' => 0, 'role' => RoleNames::ADMIN->value],
        ];

        $users = array_merge($customers, $users);

        foreach ($users as $user) {
            $user['email'] = Str::slug($user['name'], '.') . '@case.com';
            $created_user = User::query()->firstOrCreate(['email' => $user['email']], [
                'name' => $user['name'],
                'password' => bcrypt('password'),
                'revenue' => $user['revenue'],
            ]);
            $created_user->assignRole($user['role']);
        }
    }
}
