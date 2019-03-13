<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('credit_id');
            $table->foreign('credit_id')->references('id')->on('credits');
            $table->string('contract')->nullable();    
            $table->string('purchase_date')->nullable();
            $table->string('total_sale', 8, 2)->nullable(); 
            $table->string('date_of_last_payment')->nullable();
            $table->string('present_bal', 8, 2)->nullable();
            $table->string('paid_off_balance', 8, 2)->nullable();
            $table->string('term')->nullable();
            $table->string('installment' , 8, 2)->nullable();         
            $table->string('total_last_payment', 8, 2)->nullable();
            $table->string('amt_past_due', 8, 2)->nullable();
            $table->string('late_fee', 8, 2)->nullable();    
            $table->string('minimun_payment', 8, 2)->nullable();          
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
        Schema::dropIfExists('transactions');
    }
} 
