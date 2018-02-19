<?php

use Faker\Generator as Faker;

$factory->define(Haricotton\Role::class, function (Faker $faker) {
    
    $now = date('Y-m-d H:i:s', strtotime('now'));

    return [
        //
        'name' => $faker->word . 'Role',
        'description' => $faker->text,
        'created_at'=> $now,
        'updated_at'=> $now
    ];
});
