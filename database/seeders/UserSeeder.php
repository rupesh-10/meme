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
        User::factory()->count(25)->has(Meme::factory()->count(2))->create();
    }
}
