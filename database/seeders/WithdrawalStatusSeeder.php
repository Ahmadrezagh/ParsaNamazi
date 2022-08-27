<?php

namespace Database\Seeders;

use App\Models\WithdrawalStatus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WithdrawalStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $statuses = [
            'Pending',
            'Success',
            'Failed'
            ];
        foreach ($statuses as $status)
        {
            WithdrawalStatus::create([
                'title' => $status
            ]);
        }
    }
}
