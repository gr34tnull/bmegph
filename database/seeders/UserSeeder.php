<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'SUPER ADMIN',
            'email' => 'gr34tnull@gmail.com',
            'password' => Hash::make('Zxasqw12'),
            'admin' => true,
        ]);

        User::create([
            'name' => 'ADMIN',
            'email' => 'admin@icreate.live',
            'password' => Hash::make('Zxasqw12'),
            'admin' => true,
        ]);

        User::create([
            'name' => 'BMEG',
            'email' => 'admin@b-meg.ph',
            'password' => Hash::make('Zxasqw12'),
            'admin' => true,
        ]);

        User::create([
            'name' => 'TEST',
            'email' => 'test@b-meg.ph',
            'password' => Hash::make('Zxasqw12'),
            'admin' => false,
        ]);
    }
}
