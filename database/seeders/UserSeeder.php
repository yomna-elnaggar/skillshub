<?php

namespace Database\Seeders;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'=>'yomna',
            'email'=>'yomnaNasser@admin.com',
            'password'=>bcrypt('123456'),
            'role_id'=>1
        ]);
    }
}
