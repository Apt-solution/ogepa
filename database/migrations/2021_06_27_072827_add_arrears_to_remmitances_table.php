<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddArrearsToRemmitancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('remmitances', function (Blueprint $table) {
            $table->decimal('arrears', 14, 2)->default(0.00)->after('month_due');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('remmitances', function (Blueprint $table) {
            $table->dropColumn('arrears');
        });
    }
}
