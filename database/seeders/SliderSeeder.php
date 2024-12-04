<?php

use Illuminate\Database\Seeder;

class SliderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('back_sliders')->insert([
            'is_active' => 1,
            'image' => 'CAvZcaoVWvhT5ZV58mlFzstM3sPlQXzKUdfPifRl.jpeg',
            'text1' => 'LUXARY LOCATION CONVINIENCE',
            'text2' => 'BREATHTAKING APARTMENT AWAITS YOU',
        ]);

        DB::table('back_sliders')->insert([
            'is_active' => 1,
            'image' => 'MThqgPMSvft21mOpzYrqY5sIyHQPENIYt4lEMYIS.jpeg',
            'text1' => 'LUXARY LOCATION CONVINIENCE',
            'text2' => 'BREATHTAKING APARTMENT AWAITS YOU',
        ]);

        DB::table('back_sliders')->insert([
            'is_active' => 1,
            'image' => 'OH39dbnYYCZKjDngrx6LPqyveIxUNkVkG19tjxH6.jpeg',
            'text1' => 'LUXARY LOCATION CONVINIENCE',
            'text2' => 'BREATHTAKING APARTMENT AWAITS YOU',
        ]);

    }
}
