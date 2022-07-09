<?php

namespace Database\Seeders;

use App\Models\Question;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $questions = [
            [
               'description' => 'Are there any problems with making and receiving calls?' 
            ],
            [
                'description' => 'Are there any problems with your mobile screen?' 
            ],
            [
                'description' => 'Are there any defects on your phone body?' 
            ],
            [
                'description' => 'Is your mobile out of warranty?' 
            ]
        ];

        foreach($questions as $question)
        {
            Question::create([
                'description' => $question['description']
            ]);
        }
    }
}
