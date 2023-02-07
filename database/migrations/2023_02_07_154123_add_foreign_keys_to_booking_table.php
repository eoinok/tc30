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
        Schema::table('booking', function (Blueprint $table) {
            $table->foreign(['memberid'], 'booking_ibfk_1')->references(['id'])->on('member');
            $table->foreign(['courtid'], 'booking_ibfk_2')->references(['id'])->on('court');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('booking', function (Blueprint $table) {
            $table->dropForeign('booking_ibfk_1');
            $table->dropForeign('booking_ibfk_2');
        });
    }
};
