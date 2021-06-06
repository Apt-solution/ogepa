<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIndustrialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('industrials', function (Blueprint $table) {
            $table->id();
            $table->string('industryName')->nullable();
            $table->string('address')->nullable();
            $table->string('invoiceMonth')->nullable();
            $table->string('trip')->nullable();
            $table->string('perTrip')->nullable();
            $table->string('total1')->nullable();
            $table->string('currentCharge')->nullable();
            $table->string('netArreas')->nullable();
            $table->string('total2')->nullable();
            $table->string('amtWords')->nullable();
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
        Schema::dropIfExists('industrials');
    }
}
