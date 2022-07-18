<?php

namespace Database\Seeders;

use App\Http\Resources\Api\V1\PhoneProblem\PhoneProblemResource;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        $this->call([
            QuestionSeeder::class,
            PhoneProblemSeeder::class,
            RoleSeeder::class
        ]);
    }
}
