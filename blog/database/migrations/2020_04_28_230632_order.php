<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Order extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order', function (Blueprint $table) {
            $table->bigIncrements('idOrder');
            $table->integer('idClient');
            $table->foreign('idClient')->references('idClient')->on('client');
            $table->integer('idDeal');
            $table->foreign('idDeal')->references('idDeal')->on('deal');
            $table->dateTime('date');
            $table->integer('accepted');
            $table->integer('rejected');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order');
    }
}
