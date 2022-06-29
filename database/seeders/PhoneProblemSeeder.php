<?php

namespace Database\Seeders;

use App\Models\PhoneProblem;
use App\Models\PhoneProblemOption;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PhoneProblemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $phoneProblems = [
            [
                'description' => 'Functional or Physical Problems',
                'options' => [
                    [
                        'name' => '2 or more back scratch',
                        'image' => '/images/problems/2 or more back scratch.png'
                    ],
                    [
                        'name' => 'Audio jack not working',
                        'image' => '/images/problems/audio jack not working.png'
                    ],
                    [
                        'name' => 'back camera not working',
                        'image' => '/images/prblems/back camera not working.png'
                    ],
                    [
                        'name' => 'crack or broken',
                        'image' => '/images/problems/crack or broken.png'
                    ],
                    [
                        'name' => 'finger touch not working',
                        'image' => '/images/problems/finger touch not working.png'
                    ],
                    [
                        'name' => 'front camera not working',
                        'image' => '/images/problems/front camera not working.png'
                    ],
                    [
                        'name' => 'jack fault',
                        'image' => '/images/problems/jack fault.png'
                    ],
                    [
                        'name' => 'microphone not working',
                        'image' => '/images/problems/microphone not working.png'
                    ],
                    [
                        'name' => 'phone-charger',
                        'image' => '/images/problems/phone-charger.png'
                    ],
                    [
                        'name' => 'power button not working',
                        'image' => '/images/problems/power button not working.png'
                    ],
                    [
                        'name' => 'speaker fault',
                        'image' => '/images/problems/speaker fault.png'
                    ],
                    [
                        'name' => 'top speaker fault',
                        'image' => '/images/problems/top speaker fault.png'
                    ],
                    [
                        'name' => 'volume button not working',
                        'image' => '/images/problems/volume button not working.png'
                    ]
                ]
            ],
            [
                'description' => 'Do you have the following?',
                'options' => [
                    [
                        'name' => 'Bill',
                        'image' => '/images/requirements/bill.png'
                    ],
                    [
                        'name' => 'Box',
                        'image' => '/images/requirements/box.png'
                    ],
                    [
                        'name' => 'Charger',
                        'image' => '/images/requirements/charger fault.png'
                    ],
                ]
            ]
        ];

        foreach($phoneProblems as $phoneProblem)
        {
            $problem = PhoneProblem::create([
                'description' => $phoneProblem['description']
            ]);

            foreach($phoneProblem['options'] as $option)
            {
                PhoneProblemOption::create([
                    'phone_problem_id' => $problem->id,
                    'name' => $option['name'],
                    'image' => $option['image']
                ]);
            }
        }
    }
}
