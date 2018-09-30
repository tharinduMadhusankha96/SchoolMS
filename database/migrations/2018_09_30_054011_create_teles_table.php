<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTelesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teles', function (Blueprint $table) {
            $table->increments('Tid');
            $table->String('MonthYear');
            $table->String('Year');
            $table->String('Place');
            $table->String ('PaymentMethod');
            $table->float('Amount');
            $table->date('PaidDate');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('teles');
    }
}
