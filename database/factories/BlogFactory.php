<?php

use Carbon\Carbon;

$factory->define(App\Blog::class, function(Faker\Generator $faker) {
   return [
       'title' => $faker->words(2, true),
       'content' => $faker->realText(),
       'created_at' => Carbon::now()
   ];
});