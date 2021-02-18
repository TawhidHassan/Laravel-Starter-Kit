<?php

use App\Role;
use Illuminate\Database\Seeder;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $adminRole = Role::where('slug','admin')->first();
         // Create admin
         User::updateOrCreate([
            'role_id' => $adminRole->id,
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('12345678'),
            'status' => true
        ]);

         // Create user
         $userRole = Role::where('slug','user')->first();
         User::updateOrCreate([
             'role_id' => $userRole->id,
             'name' => 'Sifat hassan',
             'email' => 'user@gmail.com',
             'password' => Hash::make('12345678'),
             'status' => true
         ]);

    }
}
