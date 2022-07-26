<?php

namespace Database\Seeders;

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
            SettingGroupSeeder::class,
            SettingSeeder::class,
            UserSeeder::class,
            UserTypeSeeder::class,
            PermissionSeeder::class,
            WithdrawalStatusSeeder::class,
            //Fake data
//            PollSeeder::class
        ]);
    }
}
