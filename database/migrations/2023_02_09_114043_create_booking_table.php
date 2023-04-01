<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('booking', function (Blueprint $table) {
            $table->integer('id', true);
            $table->date('bookingdate')->nullable();
            $table->time('starttime')->nullable();
            $table->time('endtime')->nullable();
            $table->integer('memberid')->nullable()->index('memberid');
            $table->integer('courtid')->nullable()->index('courtid');
            $table->decimal('fee', 18, 3)->nullable();
            $table->dateTime('created_at')->nullable();
            $table->dateTime('updated_at')->nullable();
            $table->dateTime('deleted_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('booking');
    }
};
