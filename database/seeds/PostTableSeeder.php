<?php

use Illuminate\Database\Seeder;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Post::class,20)->create()->each(function (App\Post $post){
        	$post->tags()->attach([
        		rand(1,3),
        		rand(4,6),
        		rand(7,10),
        	]);
        });
    }
}
