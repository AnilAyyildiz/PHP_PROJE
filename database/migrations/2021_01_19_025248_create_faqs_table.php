<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFaqsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */



    public function up()
    {
        Schema::create('faqs', function (Blueprint $table) {
            $table->id();
            $table->integer("position")->nullable();
            $table->string("answer")->nullable();
            $table->string("question")->nullable();
            $table->string("status",10)->nullable()->default("True");
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
        Schema::dropIfExists('faqs');
    }
}
