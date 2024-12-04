<?php

use Illuminate\Database\Seeder;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts')->insert([
            'post_title' => 'Client 1',
            'post_description' => '<p><span dir="auto">Assort Housing and Engineering Ltd. (AHEL) has done a wonderful job by completing and handing over a G+8 storied residential apartment building named &quot;Assort Bailey Farhat&quot; at 17, New Bailey Road within the stipulated time highly professionally. To our satisfaction another contiguous land at 18, New Bailey road named &quot;Assort Bailey Nest&quot; has also been given to AHEL for the construction of a G+9 storied 27 apartment building which has also been handed over within the scheduled time. Thanks to AHEL for their professionalism in the realty trade and wish them success in their future projects.</span></p>',
            'feature_image' => '7a8ZDF7lOi0yKkJ3NOGHJ4AgArp8JGOvQdp21Y2S.jpeg',
            'status' => 1,
        ]);

        DB::table('posts')->insert([
            'post_title' => 'Mr. Hazi Mohammad Abdul Hamid <br> Managing Director, Jonaky Textile.',
            'post_description' => '<p><span dir="auto">Our first occupancy at ASSORT Bailey Farhat compels us to occupy its other Project ASSORT Shyamolima at New Bailey Road. This compulsion is its commitment &amp; workmanship.</span></p>',
            'feature_image' => 'UNXHVIu4DnF2orjEeX46fRtYekrfNtydTPxdc1kp.jpeg',
            'status' => 1,
        ]);

        DB::table('posts')->insert([
            'post_title' => 'Mr. KHAIRUL ALAM BADAL and MRS. SHABNAM IMTIAZ ALAM',
            'post_description' => '<p><span dir="auto">We bought three different flats at Bashundhara and Banani. We are really happy to say that timely handover commitment and helping attitude of Assort is commendable. We never feel unsafe to invest from abroad due to its day to day progress. It stands on its promise to single out its difference.</span></p>',
            'feature_image' => 't5ALrnMmwYjRe0bwkM0HsefjEQI3uaT6wBBznCcY.jpeg',
            'status' => 1,
        ]);

        DB::table('posts')->insert([
            'post_title' => 'MR. KHONDAKER ASHRAFUL KABIR <br> (Former Country Manager ETIHAD and OMAN Airlines, Bangladesh.)',
            'post_description' => '<p><span dir="auto">We are proud to be a member of the Assort Family.Where our expectation met with their commitments.</span></p>',
            'feature_image' => 'vhyFHMuyYjCV21yN8JmBiGy0q3r01Ku21nXY4Up5.jpeg',
            'status' => 1,
        ]);

    }
}
