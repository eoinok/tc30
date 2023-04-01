<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class memberImagesTable2 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('memberimages', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('memberid');
            $table->foreign('memberid')->references('id')->on('member');
            $table->text('description');
            $table->datetime('created_at');
            $table->datetime('updated_at');
            $table->datetime('deleted_at');
        });
        DB::statement("ALTER TABLE memberimages ADD imagefile LONGBLOB");
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('memberimages');
    }
}