<?php

use Faker\Generator as Faker;

$genders = array(
    'hip-hop',
    'rock',
    'soul',
    'R&B',
    'Blues',
    'Reggae',
    'Blues',
);

$factory->define(App\Album::class, function (Faker $faker) use ($genders){
    return [
        'album_img' => $faker-> imageUrl(500, 500),
        'album_title' => $faker->realText(25),
        'artiste_name' => $faker->name,
        'album_gender'=> $faker-> randomElement($genders),
        'product_date' => $faker->year,
        'album_label' => $faker->company,
        'album_songs' => join(', ', $faker->words(rand(5,10))),
        'album_moyen'=> $faker->biasedNumberBetween(0,10),
    ];
});
