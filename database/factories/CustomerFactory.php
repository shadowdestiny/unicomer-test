<?php

use Carbon\Carbon;
use App\Models\Customer;
use Faker\Generator as Faker;

$factory->define(Customer::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'last_name' => $faker->lastName,
        'email' => null,
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'remember_token' => str_random(10),
        'state' => $faker->state,
		'contract' => 404005997,
		'acct_num' => 124,
		'purchase_date' => Carbon::parse('-1 week'),
		'total_sale' => 336.13,
		'date_of_last_payment' => Carbon::parse('-1 week'),
		'present_bal' => 193.62,
		'paid_off_balance' => 179.73,
		'term' => 12,
		'installment' => 28.03,	     
		'total_last_payment' => 29,
		'amt_past_due' => 0,
		'late_fee' => 0,
		'minimun_payment' => 0,
		'home_address' => '9218 baronsmede dr',    
		'home_phone' => 8325660509,       
		'cell_phone' => 8329552956,         
		'ref_1_name' => $faker->name,        
		'ref_1_phone' => 8327139005,	         
		'ref_2_name' => $faker->name,       
		'ref_2_phone' => 2819981361,
		'ref_3_name' => $faker->name,       	
		'ref_3_phone' => 8322977022,	          
		'antiquity' => '000-on due',
    ];
});
