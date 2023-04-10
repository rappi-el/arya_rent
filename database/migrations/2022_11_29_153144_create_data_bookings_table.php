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
        Schema::create('data_bookings', function (Blueprint $table) {
            $table->increments("id");

            $table->integer('data_mobil_id')->unsigned();
            $table->foreign('data_mobil_id')->references('id')->on('data_mobils');

            $table->string('email');
            $table->foreign('email')->references('email')->on('users');
            $table->integer("total_harga");
            $table->string("phone");
            $table->date("tanggal_booking");
            $table->date("tanggal_kembali");

            $table->enum("Status_Pesanan", ['BELUM', 'SIAP', 'DIAMBIL', 'KEMBALI', 'SELESAI'])->default('BELUM');
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
        Schema::dropIfExists('data_bookings');
    }
};