<?php

use Illuminate\Database\Seeder;
use App\Post;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 0; $i < 10; $i++){
            $newPost = new Post();
            $newPost->imgUrl = $faker->imageUrl(640, 480);
            $newPost->title = $faker->sentence();
            $newPost->author = $faker->name();
            $newPost->content = $faker->paragraph(rand(10, 50), false);
            // $newPost->content = $faker->paragraphs(10, true);
            $newPost->slug = Str::slug($newPost->title, '-');

            $newPost->save();
        }        
    }
}
