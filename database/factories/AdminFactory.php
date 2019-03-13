<?php

use App\Models\Admin;
use Faker\Generator as Faker;

$factory->define(Admin::class, function (Faker $faker) {
    return [
        'name' => 'admin',
        'email' => 'admin@admin.com',
        'password' => 'Unicomer2018',
        'remember_token' => str_random(10),
    ];
});
