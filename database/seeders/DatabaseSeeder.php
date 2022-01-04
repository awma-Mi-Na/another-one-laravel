<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory()->create(['email' => 'awma@gmail.com']);
        foreach (range(1, 10) as $num) {
            $user = \App\Models\User::factory()->create();
            \App\Models\Student::create(['user_id' => $user->id]);
        }
    }
}
