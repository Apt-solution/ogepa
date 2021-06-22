<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddArreasToIndustrialRemmitanceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('industrial_remmitances', function (Blueprint $table) {
            $table->decimal('arreas', 12, 2)->default(0.00)->after('month_due');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('industrial_remmitances', function (Blueprint $table) {
            $table->dropColumn('arreas');
        });
    }
}
