<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIndustrialRemmitancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('industrial_remmitances', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');
            $table->decimal('amount_to_pay', 12, 2);
            $table->string('no_of_trip')->default(1);
            $table->integer('month_due');
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
        Schema::dropIfExists('industrial_remmitances');
    }
}
