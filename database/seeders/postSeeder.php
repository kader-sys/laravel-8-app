<?php

namespace Database\Seeders;

use App\Models\post;
use Illuminate\Database\Seeder;

class postSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        post::factory()
        ->count(10)
        ->create();
    }
}
