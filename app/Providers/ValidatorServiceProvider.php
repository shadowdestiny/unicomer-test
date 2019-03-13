<?php
/**
 * Created by PhpStorm.
 * User: lmarin
 * Date: 05/10/2018
 * Time: 17:36
 */

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;

class ValidatorServiceProvider extends ServiceProvider
{
    public function boot(){
        Validator::extend('amount_from_card', function ($attribute, $value, $parameters, $validator) {
            $validateFormat = preg_match('/^\d*(\.\d{1,2})?$/',$value, $matches, PREG_OFFSET_CAPTURE);
            $isMayorToOne = $value > 1;
            return $validateFormat && $isMayorToOne;
        });
    }
}