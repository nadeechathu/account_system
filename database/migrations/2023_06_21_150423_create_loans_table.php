<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLoansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loans', function (Blueprint $table) {
            $table->id();
            $table->integer('member_id');
            $table->integer('loan_category_id');
            //$table->string('loan_type');
            $table->double('loan_amount');
            $table->double('loan_rate');
            $table->string('loan_settle_week');
            $table->double('loan_documt_charg');
            $table->double('loan_collected');
            $table->double('loan_rental');
            $table->string('loan_issus_date');
            $table->integer('loan_status')->nullable()->comment('0 - Delete / 1 - Active / 2 - Pending / 3 - Diactivate / 5 - Loan Settelemt');
            $table->timestamps();

            //$table->foreign('member_id')->references('id')->on('members');
            //$table->foreign('loan_category_id')->references('id')->on('loan_categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('loans');
    }
}
