<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class StaffDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('staff_details',function(Blueprint $table){
            $table->increments('id')->unsigned;
            $table->string('first_name');
            $table->string('middle_name')->nullable;
            $table->string('last_name');
            $table->date('joined_date');
            $table->string('qualification')->nullable;
            $table->string('experience')->nullable;
            $table->binary('image')->nullable;
            $table->date('resigned_date')->nullable;
            $table->string('email');
            $table->double('phone_number', 15, 0)->unsigned;
            $table->timestamps();
            $table->softDeletes();
    });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::drop('staff_details');
    }
}
