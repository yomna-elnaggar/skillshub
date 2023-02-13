<?php

namespace Database\Seeders;
use App\Models\Sittings;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SittingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Sittings::create([
            'email' => 'contacat@shillshub.com',
            'phone' => '010253675554',
            'facebook' => 'https://www.facebook.com',
            'twitter' => 'https://www.twitter.com',
            'instaram' => 'https://www.instagram.com',
            'youtube' => 'https://www.youtube.com',
            'linkedin' => 'https://www.likedin.com'
        ]);
    }
}
