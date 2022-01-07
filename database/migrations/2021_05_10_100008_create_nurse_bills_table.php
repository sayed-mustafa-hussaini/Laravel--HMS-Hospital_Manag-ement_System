<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNurseBillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nurse_bills', function (Blueprint $table) {
            $table->bigIncrements('nurse_bill_id');
            $table->bigInteger('bill_number');
            $table->string('patient_name');
            $table->Biginteger('emp_id')->unsigned();
            $table->foreign('emp_id')->references('emp_id')->on('employees');
            $table->string('fees');
            $table->date('date');
            $table->string('description')->nullable();
             $table->Biginteger('author')->unsigned();
            $table->foreign('author')->references('id')->on('users');
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
        Schema::dropIfExists('nurse_bills');
    }
}
