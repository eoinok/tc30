<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Member as member;

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
            $table->text('description')->nullable();;
            $table->datetime('created_at')->nullable();;
            $table->datetime('updated_at')->nullable();;
            $table->datetime('deleted_at')->nullable();;
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
