<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

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
            $table->string('full_name');
            $table->string('location')->nullable();
            $table->string('phone')->unique();
            $table->string('ogwema_ref')->unique();
            $table->string('email')->nullable();
            $table->enum('role', ['admin', 'user', 'subAdmin'])->default('user');
            $table->enum('lga', ['abeokuta_north', 'abeokuta_south', 'Ado_Odo_Ota', 'ewekoro', 'ifo', 'ijebu_east', 'ijebu_north', 'ijebu_north_east', 'ijebu_ode', 'ikenne', 'imeko_afon', 'ipokia', 'obafemi_owode', 'odeda', 'odogbolu', 'ogun_waterside', 'remo_north', 'sagamu', 'yewa_north', 'yewa_south'])->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });

        // Insert some stuff
        DB::table('users')->insert(
            array(
                'email' => 'admin@ogwama.com',
                'full_name' => 'admin',
                'location' => 'Abeokuta',
                'ogwema_ref' => 'ooo',
                'phone' => '23490989098',
                'password' => '$2y$10$H21XXthP1v1td1YxHNxytOMt4bmbXc3gfswaeNyoOB.Sj6Gnac7PK', //password
                'role' => 'admin',
                'created_at' => '2021-05-11 11:40:41',
                'updated_at' => '2021-05-11 11:40:41'
            )
        );
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
