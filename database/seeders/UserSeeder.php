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
    
    }
}
