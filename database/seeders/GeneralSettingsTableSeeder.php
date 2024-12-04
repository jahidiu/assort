<?php

use Illuminate\Database\Seeder;

class GeneralSettingsTableSeeder extends Seeder {
    /**
    * Run the database seeds.
    *
    * @return void
    */

    public function run() {
        DB::table( 'general_settings' )->insert( [
            'id'            => 1,
            'site_name'     => 'ASSORT',
            'site_title'    => 'Housing & Engineering LTD',
            'short_info'    => 'Assort Housing & Engineering Ltd. is a fast growing housing company with the effort of a team of experienced and qualified professionals.',
            'site_logo'     => 'DShs3QdDgih2jmLW66ucwlJdNoxW0NbKD94XJYYe.png',
            'footer_text'   => "Kitchen CMS",
        ] );
    }
}
