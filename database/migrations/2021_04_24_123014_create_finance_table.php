<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFinanceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('finance', function (Blueprint $table) {
            $table->BigIncrements('f_id');
            $table->bigInteger('fees');
            $table->bigInteger('relate_id');
            $table->Biginteger('dep_id')->unsigned();
            $table->foreign('dep_id')->references('dep_id')->on('departments');
            $table->BigInteger('patient_id');
            $table->string('description')->nullable();
            $table->string('status');
            $table->string('type_charges');
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
        Schema::dropIfExists('finance');
    }
}
