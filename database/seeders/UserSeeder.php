<?php

namespace Database\Seeders;

use App\Status;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'admin',
            'fullname' => 'admin',
            'email' => 'thangdotpro@gmail.com',
            'password' => Hash::make('123123'),
            'role' => 'admin',
            'slug' => Str::slug('admin'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('users')->insert([
            'name' => 'author',
            'fullname' => 'admin',
            'email' => 'lexuanhoa@gmail.com',
            'password' => Hash::make('123123'),
            'role' => 'author',
            'slug' => Str::slug('author'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('users')->insert([
            'name' => 'user',
            'fullname' => 'user',
            'email' => 'user@gmail.com',
            'password' => Hash::make('123123'),
            'role' => 'user',
            'slug' => Str::slug('user'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
