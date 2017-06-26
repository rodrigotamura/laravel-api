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
$factory->define(laravelAPI\Entities\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});
$factory->define(laravelAPI\Entities\Client::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'responsable' => $faker->name,
        'phone' => $faker->tollFreePhoneNumber,
        'address' => $faker->address,
        'obs' => $faker->sentence
    ];
});
$factory->define(laravelAPI\Entities\Project::class, function (Faker\Generator $faker) {
    return [
        'owner_id' => $faker->numberBetween(1,10),
        'client_id' => $faker->numberBetween(1,10),
        'name' => $faker->name,
        'description' => $faker->sentence,
        'progress' => $faker->numberBetween(0,100),
        'status' => $faker->numberBetween(1,3),
        'due_date' => $faker->dateTime('now')
    ];
});
$factory->define(laravelAPI\Entities\ProjectNote::class, function (Faker\Generator $faker) {
    return [
        'project_id' => $faker->numberBetween(1,10),
        'title' => $faker->word,
        'note' => $faker->paragraph
    ];
});
