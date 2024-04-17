<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Course;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'admin',
        //     'email' => 'admin@gmail.com',

        // ]);

        DB::table('users')->insert([
            'name' => 'user',
            'email' => 'user@gmail.com',
            'password' => Hash::make('user12345'),
            'phone'=>'123456789',
            'address' =>'Yangon',
            'gender' => 'male',

        ]);
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin12345'),
            'role' =>'admin',
            'phone'=>'197895674564356',
            'address' =>'Mandalay',
            'gender' => 'female',
        ]);
        DB::table('categories')->insert([
            'name'=>'online class'
        ]);
        DB::table('categories')->insert([
            'name'=>'video class'
        ]);
        DB::table('categories')->insert([
            'name'=>'Inclass '
        ]);



        // Category::factory(3)-> has(Course::factory()->count(2),'courses') ->create();

    }
}
