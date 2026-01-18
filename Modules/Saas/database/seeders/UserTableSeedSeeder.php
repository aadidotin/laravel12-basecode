<?php

namespace Modules\Saas\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Saas\Models\Admin;

class UserTableSeedSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // $this->call([]);
        Admin::create([
            "name" => "Super Admin",
            "email" => "emmit.one@gmail.com",
            "password" => "password"
        ]);
    }
}
