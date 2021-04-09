<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('address');
            $table->string('phone');
            $table->string('email')->nullable();
            $table->string('ogwema_ref')->unique();
            $table->enum('role', ['admin', 'user'])->default('user');
            $table->enum('client_type', ['residential', 'commercial', 'industrial', 'medical']);
            $table->enum('lga', ['abeokuta_north', 'abeokuta_south', 'Ado_Odo_Ota', 'ewekoro', 'ifo', 'ijebu_east', 'ijebu_north', 'ijebu_north_east', 'ijebu_ode', 'ikenne', 'imeko_afon', 'ipokia', 'obafemi_owode', 'odeda', 'odogbolu', 'ogun_waterside', 'remo_north', 'sagamu', 'yewa_north', 'yewa_south']);
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
