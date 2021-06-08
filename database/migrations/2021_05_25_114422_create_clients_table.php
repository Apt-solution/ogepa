<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->enum('type', ['Residential', 'Commercial', 'Medical', 'Industrial', 'PSP']);
            $table->string('sub_client_type')->nullable();
            $table->integer('no_of_sub_client_type')->default(1);
            $table->string('address')->nullable();
            $table->decimal('initialAmount', 12, 2);
            $table->integer('enteredBy');
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
        Schema::dropIfExists('clients');
    }
}
