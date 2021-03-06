<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\MenuSeeder;
use Database\Seeders\PageSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(PermissionSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(PageSeeder::class);
        $this->call(MenuSeeder::class);
    }

}
