<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuratKeluarTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('surat_keluar', function (Blueprint $table) {
            $table->id();
            $table->string('nomor_surat', 50);
            $table->date('tanggal');
            $table->string('pembuat', 100);
            $table->string('penerima', 100);
            $table->string('lampiran')->nullable();
            $table->string('alamat_penerima', 255);
            $table->text('isi_surat')->nullable();
            $table->string('perihal', 255);
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
        Schema::dropIfExists('surat_keluar');
    }
}
