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
<<<<<<< HEAD
            $table->enum('type', ['Residential', 'Commercial', 'Medical', 'Industrial']);
            $table->string('sub_client_type');
            $table->integer('no_of_sub_client_type')->default(1);
            $table->string('address');
=======
            $table->enum('type', ['Residential', 'Commercial', 'Medical', 'Industrial', 'PSP']);
            $table->string('sub_client_type')->nullable();
            $table->integer('no_of_sub_client_type')->default(1);
            $table->string('ogwama_ref')->unique();
            $table->enum('lga', ['abeokuta_north', 'abeokuta_south', 'Ado_Odo_Ota', 'ewekoro', 'ifo', 'ijebu_east', 'ijebu_north', 'ijebu_north_east', 'ijebu_ode', 'ikenne', 'imeko_afon', 'ipokia', 'obafemi_owode', 'odeda', 'odogbolu', 'ogun_waterside', 'remo_north', 'sagamu', 'yewa_north', 'yewa_south'])->nullable();
            $table->string('address')->nullable();
>>>>>>> a0b3e4a982aac5e1ad8a11e4d9c8de93b364cfe9
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
