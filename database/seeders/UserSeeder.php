<?php

namespace Database\Seeders;

use App\Enums\User_role;
use App\Models\User;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        $faker = Factory::create();
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        DB::table('users')->truncate();


        for ($i = 0; $i < 100; $i++) {
            User::create([
                'address' => $faker->address,
                'avatar' => $faker->image('public/libs/assets/images/User_image/',200,200,null,false),
                'birthday' => '1999-01-02',
                'cover_photo' => 'https://kenh14cdn.com/2020/8/28/photo-1-15986171022051518128948.jpg',
                'created_at' => date("Y-m-d"),
                'email' => $faker->eaiml,
                'password' => Hash::make('123456'),
                'phone' => '09879' . $i . '7789',
                'role' => User_role::USER,
                'user_name' => $faker->name,
            ]);
        }
    }
}
