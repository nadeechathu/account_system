<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->integer('center_id');
            $table->string('member_code');
            $table->string('member_name');
            $table->string('member_phone_no')->length('15');
            $table->string('member_nic');
            $table->string('member_address');
            $table->integer('member_group_no')->length('5')->nullable();
            $table->string('member_register_date');
            $table->integer('member_status')->nullable()->comment('0 - Delete / 1 - Active / 2 - Pending / 3 - Diactivate');
            $table->timestamps();

            //$table->foreign('center_id')->references('id')->on('centers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('members');
    }
}
