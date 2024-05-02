<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGuarantorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('guarantors', function (Blueprint $table) {
            $table->id();
            
            $table->integer('loan_category_id')->comment('1- Speed Loan, 2 - Business Loan , 3 - Micro Loan');
            $table->integer('member_id');

            $table->string('guarantor_01_name')->nullable();
            $table->string('guarantor_01_nic')->nullable();
            $table->string('guarantor_01_phone')->nullable();
            $table->string('guarantor_01_address')->nullable();
            $table->string('guarantor_01_birthday')->nullable();
            $table->string('guarantor_01_age')->nullable();
            $table->string('guarantor_01_job')->nullable();

            $table->string('guarantor_02_name')->nullable();
            $table->string('guarantor_02_nic')->nullable();
            $table->string('guarantor_02_phone')->nullable();
            $table->string('guarantor_02_address')->nullable();
            $table->string('guarantor_02_birthday')->nullable();
            $table->string('guarantor_02_age')->nullable();
            $table->string('guarantor_02_job')->nullable();

            $table->string('member_relationship')->comment('1-Son , 2-Husband , 3-wife')->nullable();
            $table->string('member_relationship_pserson_name')->nullable();
            $table->string('member_relationship_pserson_nic')->nullable();
            $table->string('member_relationship_pserson_phone')->nullable();

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
        Schema::dropIfExists('guarantors');
    }
}
