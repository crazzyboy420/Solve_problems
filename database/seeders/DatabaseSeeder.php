<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Author;
use App\Models\Course;
use App\Models\Platform;
use App\Models\Series;
use App\Models\Topic;
use App\Models\User;
use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);


        $series = ['PHP', 'JavaScript', 'Wordpress', 'Laravel'];
        foreach($series as $item){
            Series::create([
                'name'=>$item
            ]);
        }

        $series = ['rael', 'Testing name', 'Wordpress', 'Laravel'];
        foreach($series as $item){
            Author::create([
                'name'=>$item
            ]);
        }


        $topics = ['Eloquent', 'Validation', 'Authentication', 'String'];
        foreach($topics as $item){
            Topic::create([
                'name'=>$item
            ]);
        }

        $platforms = ['Laracast','youtube', 'Laravel.io', 'Larajob', 'Laracast Forum'];
        foreach($platforms as $item){
            Platform::create([
                'name'=>$item
            ]);
        }
         Course::factory(100)->create();
         $courses = Course::all();
       foreach($courses as $course) {
            $topics = Topic::all()->random(rand(1, 4))->pluck('id')->toArray();
            $course->topics()->attach($topics);

            $authors = Author::all()->random(rand(1, 3))->pluck('id')->toArray();
             $course->authors()->attach($authors);

            $series = Series::all()->random(rand(1, 4))->pluck('id')->toArray();
           $course->series()->attach($series);
       }


    }
}
