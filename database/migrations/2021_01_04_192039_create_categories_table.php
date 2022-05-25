<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */




    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->integer("parent_id")->default(0);
            $table->string("title",150);
            $table->string("keywords")->nullable(true);
            $table->string("description")->nullable(true);
            $table->string("image",100)->nullable(true);
            $table->string("slug",100)->nullable(true);
            $table->string("status",10)->nullable(true)->default("False");
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
        Schema::dropIfExists('categories');
    }
}
