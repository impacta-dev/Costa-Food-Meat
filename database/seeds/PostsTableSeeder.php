<?php

use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Post::class, 15)->create();
        // factory(App\Post::class, 15)->create()->each(function ($post) {
        //     $post->images()->save(factory(App\PostImage::class)->make());
        // });
    }
}
