<?php

namespace Database\Seeders;

use App\Models\SettingGroup;
use Illuminate\Database\Seeder;

class SettingGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $groups = [
            'Website',
            'About us',
            'Contact us',
            'Gifts',
            'Withdrawal',
            'Where To Start',
            'Telegram Bot',
            'TradingView',
        ];
        foreach ($groups as $group)
        {
            SettingGroup::create([
                'name' => $group
            ]);
        }
    }
}
