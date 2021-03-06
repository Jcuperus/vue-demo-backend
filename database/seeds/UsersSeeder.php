<?php

use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\User::class, 10)->create()->each(function($user) {
            factory(\App\Blog::class, 20)->create([
                'user_id' => $user->id
            ]);
        });
    }
}
