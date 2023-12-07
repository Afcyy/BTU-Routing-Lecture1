<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Quiz;

class QuizSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Quiz::factory()
            ->notActive()
            ->create();

        Quiz::factory()
            ->withoutDescription()
            ->create();

        Quiz::factory()
            ->withoutImage()
            ->create();

        Quiz::factory()
            ->count(5)
            ->create();
    }
}
