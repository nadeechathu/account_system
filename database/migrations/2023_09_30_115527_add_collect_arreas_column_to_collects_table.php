<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCollectArreasColumnToCollectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('collects', function (Blueprint $table) {
            //
            $table->string('collect_arreas')->after('collect_amount');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('collects', function (Blueprint $table) {
            //
            $table->dropColumn('collect_arreas');
        });
    }
}
