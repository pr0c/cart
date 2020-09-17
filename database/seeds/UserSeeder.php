<?php

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
        DB::table('users')->delete();
        DB::update('ALTER TABLE users AUTO_INCREMENT = 1');

        $admin = User::create([
            'name' => 'admin',
            'password' => Hash::make('1111'),
            'email' => 'admin@cart.loc'
        ]);
        $admin->roles()->attach(1);

        $user = User::create([
            'name' => 'user',
            'password' => Hash::make('1111'),
            'email' => 'user@mail.loc'
        ]);
        $user->roles()->attach(2);
    }
}
