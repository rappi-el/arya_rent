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
        Schema::create('data_mobils', function (Blueprint $table) {
            
            $table->increments("id");
            $table->string("nama_mobil");
            $table->integer("kapasitas_mobil");
            $table->boolean("transmisi_mobil");
            $table->integer("harga_mobil");
            $table->boolean("status_mobil")->default(1);
                  
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('data_mobils');
    }
};
