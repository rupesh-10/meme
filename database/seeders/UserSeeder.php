<?php

namespace Database\Seeders;

use App\Models\Meme;
use App\Models\User;
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
            'name' => "Test User",
            'email' => "testuser@email.com",
            'email_verified_at' => '2020-11-02 15:20:20',
            'password' => \Hash::make('testpassword'),
            'remember_token' => "remember123",
            'created_at' => now(),
            "updated_at" => now()
        ]);
        User::factory()->count(25)->has(Meme::factory()->count(2))->create();
    }
}
