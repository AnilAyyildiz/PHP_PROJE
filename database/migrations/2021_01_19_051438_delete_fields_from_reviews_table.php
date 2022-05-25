<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;



class DeleteFieldsFromReviewsTable extends Migration
{


    /**
     * Run the migrations.
     *
     * @return void
     */


    public function up()
    {
        Schema::table('reviews', function (Blueprint $table) {
            $table->dropSoftDeletes("rate");
        });
    }




    /**
     * Reverse the migrations.
     *
     * @return void
     */



    public function down()
    {
        Schema::table('reviews', function (Blueprint $table) {
            //
        });
    }
}
