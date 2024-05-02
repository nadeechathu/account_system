<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTwoColumnsCenterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('centers', function (Blueprint $table) {
            $table->integer('center_allocate_date')->after('center_name');
            $table->integer('executive_person')->after('center_name');         
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('centers', function (Blueprint $table) {
            $table->dropColumn('center_allocate_date')->comment('Monday to Sunday Date7');
            $table->dropColumn('executive_person')->comment('Thiwanka / Indika');
           
        });
    }
}
