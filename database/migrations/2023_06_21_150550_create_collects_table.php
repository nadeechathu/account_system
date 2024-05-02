<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCollectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('collects', function (Blueprint $table) {
            $table->id();
            $table->integer('member_id');
            $table->integer('loan_id');
            $table->double('collect_amount');
            $table->double('collect_loan_balnce')->comment('Denata gewimata athi mudala');
            $table->double('collect_loan_paid_balnce')->comment('Denata gewa athi mudala');
            $table->string('collect_date');
            $table->double('collect_settle_week')->comment('Loan aka settle karanna denata ethiriwa athi weeks ganana');
            $table->string('collect_person')->comment('Thiwanka / Indika');
            $table->integer('collect_status')->nullable()->comment('0 - Delete / 1 - Active / 2 - Pending / 3 - Diactivate / 4 - Arrears / 5 - Loan Settelemt / 6 - Hold');
            $table->timestamps();

            //$table->foreign('member_id')->references('id')->on('members');
            //$table->foreign('loan_id')->references('id')->on('loans');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('collects');
    }
}
