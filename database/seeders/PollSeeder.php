<?php

namespace Database\Seeders;

use App\Models\Poll;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PollSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $arr = [
            'A',
            'B',
            'C',
            'D'
        ];
        foreach ($arr as $item)
        {
            $poll = Poll::create([
                'title' => $item,
                'active' => rand(0,1)
            ]);

            for ($i = 1;$i < 5; $i++)
            {
                $poll->options()->create([
                    'title' => $item." ".$i
                ]);
            }
        }
    }
}
