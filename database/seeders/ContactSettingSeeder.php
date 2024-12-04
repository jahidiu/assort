<?php

use Illuminate\Database\Seeder;

class ContactSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('contact_settings')->insert([
            'email'     => 'example@email.com',
            'phone'     => '555-555-555',
            'whatsapp_number'     => '01729596322',
            'address'   => 'address text goes here',
            'facebook'  => 'https://www.facebook.com',
            'twitter'   => 'https://www.twitter.com',
            'instagram' => 'https://www.instagram.com',
            'linkedin'  => 'https://www.linkedin.com',
            'skype'     => 'https://www.skype.com',
            'youtube'   => 'https://www.youtube.com',
        ]);
    }
}
