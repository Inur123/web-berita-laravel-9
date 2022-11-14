<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Categori;
use App\Models\Post;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::create([
            'name' => 'zainurroziqin',
            'username' => 'zainur',
            'email' => 'zainur@gmail.com',
            'password' => bcrypt('123456')
        ]);
        // User::create([
        //     'name' => 'Anis',
        //     'email' => 'anis@gmail.com',
        //     'password' => bcrypt('123456')
        // ]);
        User::factory(3)->create();

        Category::create([
            'name' => 'Web Programming',
            'slug' => 'web-programming',
        ]);
        Category::create([
            'name' => 'Web Design',
            'slug' => 'web-design',
        ]);
        Category::create([
            'name' => 'Personal',
            'slug' => 'personal',
        ]);
        

        Post::factory(20)->create();
        // Post::create([
        //     'title' => 'Judul Pertama',
        //     'slug' => 'judul-pertama',
        //     'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptas non accusantium ratione consectetur. Sed error mollitia esse dolores id at porro ut, laudantium perferendis',
        //     'body' => 'maiores veniam voluptatem et ad itaque asperiores reprehenderit sit nulla, magnam, ratione eveniet officia fugit veritatis? Odit repudiandae fuga quibusdam omnis ad, saepe quaerat. Sequi, incidunt',
        //     'category_id' => 1,
        //     'user_id' => 1
        // ]);
        // Post::create([
        //     'title' => 'Judul Kedua',
        //     'slug' => 'judul-ke-dua',
        //     'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptas non accusantium ratione consectetur. Sed error mollitia esse dolores id at porro ut, laudantium perferendis',
        //     'body' => 'maiores veniam voluptatem et ad itaque asperiores reprehenderit sit nulla, magnam, ratione eveniet officia fugit veritatis? Odit repudiandae fuga quibusdam omnis ad, saepe quaerat. Sequi, incidunt',
        //     'category_id' => 1,
        //     'user_id' => 1
        // ]);
        // Post::create([
        //     'title' => 'Judul Ketiga',
        //     'slug' => 'judul-ke-tiga',
        //     'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptas non accusantium ratione consectetur. Sed error mollitia esse dolores id at porro ut, laudantium perferendis',
        //     'body' => 'maiores veniam voluptatem et ad itaque asperiores reprehenderit sit nulla, magnam, ratione eveniet officia fugit veritatis? Odit repudiandae fuga quibusdam omnis ad, saepe quaerat. Sequi, incidunt',
        //     'category_id' => 2,
        //     'user_id' => 2
        // ]);

    }
}
