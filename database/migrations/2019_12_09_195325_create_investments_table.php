<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvestmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('investments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('business_id');
            $table->unsignedBigInteger('business_investor_id');
            $table->unsignedBigInteger('transaction_id');
            $table->timestamps();
            $table->foreign('business_id')->references('id')->on('businesses')->onDelete('cascade');
            $table->foreign('business_investor_id')->references('id')->on('business_investors')->onDelete('cascade');
            $table->foreign('transaction_id')->references('id')->on('transactions')->onDelete('cascade');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('investments');
    }
}
