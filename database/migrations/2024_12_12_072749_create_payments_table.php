<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id('payment_id'); 
            $table->date('payment_date'); 
            $table->decimal('amount', 10, 2); 
            $table->unsignedBigInteger('subscription_id'); 
            $table->string('payment_method'); 
            $table->string('proof')->nullable(); 
            $table->timestamps();

            //dont forget to comment and uncomment this if you want to migrate
           $table->foreignId('subscription_id')->references('subscription_id')->on('subscriptions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payments');
    }
};
