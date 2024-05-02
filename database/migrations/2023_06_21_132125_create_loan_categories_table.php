<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLoanCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loan_categories', function (Blueprint $table) {

            $table->id();
            //$table->string('loan_category_code');
            $table->string('loan_category_name')->comment('Speed Laon, Business Loan');
            $table->double('loan_category_amount');
            $table->double('loan_interst_rate');
            $table->integer('loan_duration')->comment(' eg:- 20 weeks , 10 weeks');
            $table->double('loan_category_def_docharg')->comment('Defult Document Charg');
            $table->integer('loan_category_status')->nullable()->comment('0 - Delete / 1 - Active / 2 - Pending / 3 - Diactivate');
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
        Schema::dropIfExists('loan_categories');
    }
}
