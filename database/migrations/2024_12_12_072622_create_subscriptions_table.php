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
        Schema::create('subscriptions', function (Blueprint $table) {
            $table->id('subscription_id');
            $table->string('produk');
            $table->decimal('harga', 10, 2);
            $table->date('due_date');
            $table->unsignedBigInteger('frequency_id');
            $table->unsignedBigInteger('user_id');
            $table->timestamps();
    
            
            //dont forget to comment and uncomment this if you want to migrate
            $table->foreignId('frequency_id')->references('frequency_id')->on('frequencies');
            $table->foreignId('user_id')->references('user_id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('subscriptions');
    }
};
