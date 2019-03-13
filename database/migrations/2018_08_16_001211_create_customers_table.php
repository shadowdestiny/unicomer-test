<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('acct_num')->unique();
            $table->string('name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('email')->unique()->nullable();
            $table->string('password')->nullable();
            $table->string('state')->nullable();
            $table->string('home_address')->nullable();  
            $table->string('home_phone')->nullable();
            $table->string('cell_phone')->nullable();
            $table->string('ref_1_name')->nullable();
            $table->string('ref_1_phone')->nullable();
            $table->string('ref_2_name')->nullable();
            $table->string('ref_2_phone')->nullable();
            $table->string('ref_3_name')->nullable();
            $table->string('ref_3_phone')->nullable(); 
            $table->string('antiquity')->nullable();
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customers');
    }
} 

/*

Agrupar fechas
Agrupar Direcciones y Separarlas


$table->unsignedInteger('customer_id');
$table->foreign('ref_1')->references('id')->on('customers')->nulleabled();
$table->unsignedInteger('customer_id');
$table->foreign('ref_2')->references('id')->on('customers')->nulleabled();
$table->unsignedInteger('customer_id');
$table->foreign('ref_3')->references('id')->on('customers')->nulleabled();


*/