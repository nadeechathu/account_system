<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumCategoryIdToLoanCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('loan_categories', function (Blueprint $table) {
            $table->integer('categories_id')->after('id')->comment("1=>Speed Loan, 2=> Business Loan , 3=> Micro Loan");
            $table->dropColumn('loan_category_name');
        });
    }
    
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('loan_categories', function (Blueprint $table) {
            $table->dropColumn('categories_id');
            $table->integer('loan_category_name');

        });
    }
}
