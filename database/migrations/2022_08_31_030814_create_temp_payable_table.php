<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTempPayableTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('temp_payable', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('breakdown')->nullable();
            $table->string('amount')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });

        Schema::create('temp_cashier', function (Blueprint $table) {
            $table->id()->startingValue(10000);
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('cashier_id')->nullable();
            $table->string('description')->nullable();
            $table->string('sub_total')->nullable();
            $table->string('discount')->nullable();
            $table->string('total')->nullable();
            $table->string('cash_entered')->nullable();
            $table->string('mop')->nullable();
            $table->string('ref_id')->nullable();
            $table->string('prof_img')->nullable();
            $table->string('balance')->nullable();
            $table->string('change')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('cashier_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('temp_payable');
        Schema::dropIfExists('temp_cashier');
    }
}
