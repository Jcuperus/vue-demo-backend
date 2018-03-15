<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\User::class)->create([
            'name' => 'Jaep',
            'email' => 'jcuperus@codegorilla.nl',
            'password' => Hash::make('admin')
        ]);
    }
}
