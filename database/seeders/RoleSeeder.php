<?php

namespace Database\Seeders;

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
        Role::firstOrCreate([
            'name' => Role::ROLE_ADMIN,
        ]);

        Role::firstOrCreate([
            'name' => Role::ROLE_KASIR,
        ]);

        Role::firstOrCreate([
            'name' => Role::ROLE_OWNER,
        ]);
    }
}
