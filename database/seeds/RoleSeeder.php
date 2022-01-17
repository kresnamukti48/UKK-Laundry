<?php

namespace Database\seeds;

use Illuminate\Database\Seeder;
use App\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            'name' => Role::ROLE_ADMIN,
        ]);

        Role::create([
            'name' => Role::ROLE_KASIR,
        ]);

        Role::create([
            'name' => Role::ROLE_USER,
        ]);
    }
}
