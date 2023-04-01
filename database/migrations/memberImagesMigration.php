<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMemberImagesTable extends Migration
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
            $table->timestamp('created_at');
            $table->timestamp('updated_at');
            $table->timestamp('deleted_at');
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