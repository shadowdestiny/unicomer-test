<?php
namespace App\Helpers;
/**
 * Created by PhpStorm.
 * User: lmarin
 * Date: 05/10/2018
 * Time: 12:56
 */
class AmountFormat
{
    public static function normalFormat($amount){
        return number_format($amount,2);
    }
}