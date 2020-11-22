<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        DB::table('user_role')->truncate();

        $adminRole = Role::where('name', 'admin')->first();
        $authorRole = Role::where('name', 'author')->first();
        $userRole = Role::where('name', 'user')->first();

        $admin = User::create([
          'name' => 'AdminRole',
          'email' => 'admin@admin.com',
          'password' => Hash::make('password')
        ]);

        $author = User::create([
          'name' => 'AuthorRole',
          'email' => 'author@author.com',
          'password' => Hash::make('password')
        ]);

        $user = User::create([
          'name' => 'UserRole',
          'email' => 'user@user.com',
          'password' => Hash::make('password')
        ]);

        $admin->roles()->attach($adminRole);
        $author->roles()->attach($authorRole);
        $user->roles()->attach($userRole);

    }
}
