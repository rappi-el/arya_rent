<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_pembayarans', function (Blueprint $table) {
            $table->increments('data_booking_id');
            $table->foreign('data_booking_id')->references('id')->on('data_bookings');
            $table->string("reference");
            $table->string("merchant_ref");
            $table->integer("Total_amount");
            $table->enum("status", ['PAID', 'UNPAID', 'EXPIRED', 'FAILED', 'REFUND'])->default('UNPAID');
            $table->timestamp('created_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('data_pembayarans');
    }
};