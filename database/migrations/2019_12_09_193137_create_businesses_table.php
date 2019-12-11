<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBusinessesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('businesses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('business_owner_id');
            $table->text('value_proposition');
            $table->text('title');
            $table->text('description');
            $table->text('customer_segment');
            $table->text('key_resources');
            $table->enum('type', ['investment', 'sale']);
            $table->boolean('verified')->default(false);
            $table->enum('status', ['open','close'])->default('open');
            $table->string('cover_url');
            $table->bigInteger('value');
            $table->timestamps();

            $table->foreign('business_owner_id')->references('id')->on('business_owners')->onDelete('cascade');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('businesses');
    }
}
