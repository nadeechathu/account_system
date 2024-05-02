<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnInExecutivePersonLoanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::table('loans', function (Blueprint $table) {
            $table->integer('executive_person')->after('loan_issus_date');  
        });
       
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('loans', function (Blueprint $table) {
       
            $table->dropColumn('executive_person')->comment('Thiwanka / Indika');
           
        });
    }
}
