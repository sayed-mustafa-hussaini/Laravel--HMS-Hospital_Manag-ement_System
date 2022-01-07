<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOpdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('opds', function (Blueprint $table) {
            $table->BigIncrements('opd_id');
            $table->string('patient_id');
            $table->string('o_f_name');
            $table->string('o_l_name');
            $table->string('phone');
            $table->string('gender');
            $table->string('age');
            $table->Biginteger('dep_id')->unsigned();
            $table->foreign('dep_id')->references('dep_id')->on('departments');
            $table->Biginteger('emp_id')->unsigned();
            $table->foreign('emp_id')->references('emp_id')->on('employees');
            $table->date('date')->nullable();
            $table->Biginteger('author')->unsigned();
            $table->foreign('author')->references('id')->on('users');
            $table->string('referral_person')->nullable();    
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
        Schema::dropIfExists('opds');
    }
}
