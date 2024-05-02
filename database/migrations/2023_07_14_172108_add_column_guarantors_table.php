<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnGuarantorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('guarantors', function (Blueprint $table) {
            $table->integer('guarantor_status')->default(0)->nullable()->after('member_id');                 
            $table->integer('guarantor_member_2')->nullable()->after('member_id');                 
            $table->integer('guarantor_member_1')->nullable()->after('member_id');                 
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('guarantors', function (Blueprint $table) {
            $table->dropColumn('guarantor_status');
            $table->dropColumn('guarantor_member_2');
            $table->dropColumn('guarantor_member_1');
       });
    }
}
