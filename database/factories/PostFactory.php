<?php

use App\Post;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/
//$users ->each(function($user){
//    factory('App/Post',10)->create([
//
//        'user_id'=>$user->id,
//        'category_id'=>rand(1,20),
//    ]);
//});
//$posts=Post::all();
//$posts ->each(function($post){
//    $post->tags()->attach(array_unique([
//        rand(1,7),rand(1,7),rand(1,7)]));
//});
//
//$factory->define(Post::class, function (Faker $faker) {
//    return [
//
//        'description' => $faker->sentence(20),
//
//    ];
//});
//




$factory->define(Post::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence,
        'text' => $faker->text(1000),
        'cover' => $faker->imageUrl(),
        'description' => $faker->sentence(20),

    ];
});
