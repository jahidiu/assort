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
        $this->call(UserTableSeeder::class);
        $this->call(ModuleTableSeeder::class);
        $this->call(GroupTableSeeder::class);
        $this->call(UserSettingsSeeder::class);
        $this->call(GeneralSettingsTableSeeder::class);
        $this->call(ContactSettingSeeder::class);
        $this->call(SliderSeeder::class);
        $this->call(HandOverProjectSeeder::class);
        $this->call(GroupPermissionTableSeeder::class);
    }
}
