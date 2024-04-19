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
        DB::table('lessons')->insert([
            'name'=>'Vue ',
            'course_id'=>'1'
        ]);
        DB::table('lessons')->insert([
            'name'=>'Vue ',
            'course_id'=>'1'
        ]);
        DB::table('courses')->insert([
            'title'=>'A - Z ',
            'category_id'=>'2',
            'price'=> '150000',
            'description'=>"good at teaching",
            'time'=> '8 to 10',
            'day'=> 'Weekday',
            'point'=> '30',

        ]);
        DB::table('courses')->insert([
            'title'=>'React ',
            'category_id'=>'1',
            'price'=> '50000',
            'description'=>"good at teaching",
            'time'=> 'free',
            'day'=> 'free',
            'point'=> '10',

        ]);



        // Category::factory(3)-> has(Course::factory()->count(2),'courses') ->create();

    }
}
