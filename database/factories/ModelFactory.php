<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function(Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Product::class, function(Faker\Generator $faker) {
    $sellers = App\Seller::pluck('id')->all();

    return [
        'name' => $faker->word,
        'price' => $faker->randomFloat(2, 1, 1000),
        'description' => $faker->text,
        'seller_id' => $faker->randomElement($sellers),
    ];
});

$factory->define(App\Tag::class, function(Faker\Generator $faker) {

    return [
        'name' => $faker->word,
    ];
});

$factory->define(App\Review::class, function(Faker\Generator $faker) {
    $sellers = App\Product::pluck('id')->all();

    return [
        'reviewer_name' => $faker->name,
        'title' => $faker->word,
        'content' => $faker->text,
        'date' => $faker->date,
        'product_id' => $faker->randomElement($products),
    ];
});

$factory->define(App\Seller::class, function(Faker\Generator $faker) {
    $addresses = App\Address::pluck('id')->all();

    return [
        'name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'address_id' => $faker->randomElement($addresses),
    ];
});

$factory->define(App\Address::class, function(Faker\Generator $faker) {
    return [
        'address' => $faker->streetAddress,
        'city' => $faker->city,
        'state' => $faker->state,
        'country' => $faker->country,
        'postal_code' => $faker->randomNumber(5),
    ];
});


/*
$factory->define(App\Address::class, function(Faker\Generator $faker) {
    return [
        'seller_id' => 0,
    ];
});
*/