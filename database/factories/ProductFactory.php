<?php

use Faker\Generator as Faker;
use App\Produc;

$factory->define(Produc::class, function (Faker $faker) {
    return [
        'name'=> $faker->words(3,true),
        'description'=> $faker->sentence(10),
        'long_description'=> $faker->text(),
        'selling_price'=> $faker->randomFloat(2,0,9999),
        'category_id' => $faker->numberBetween(1,5)
    ];
});
