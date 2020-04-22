<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBerkasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('berkas', function (Blueprint $table) {
            $table->bigIncrements('berkas_id');
            $table->bigInteger('berkas_sw_id');
            $table->string('berkas_fotoSurat');
            $table->enum('berkas_status', ['Belum', 'Sudah']);
            $table->enum('berkas_jenis', ['KHS', 'Surat PKL']);
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
        Schema::dropIfExists('berkas');
    }
}
