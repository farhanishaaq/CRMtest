<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Admin;
use App\Models\Category;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        Admin::create([
            'name'=>'Farhan Ishaq',
            'email'=>'admin@admin.com',
            'password'=>bcrypt('password')
        ]);
        Category::create([
            'title'=>'Image',
            'slug'=>'image_post',
            'description'=>'it is post of image',
        ]); Category::create([
            'title'=>'Video',
            'slug'=>'video_post',
            'description'=>'it is post of video',
        ]);
        Category::create([
            'title'=>'Article',
            'slug'=>'article_post',
            'description'=>'it is post of article',
        ]);
    }
}
