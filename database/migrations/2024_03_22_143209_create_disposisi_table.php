<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDisposisiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('disposisi', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_surat_masuk');
            $table->foreign('id_surat_masuk')->references('id')->on('surat_masuk')->onDelete('cascade');
            $table->text('perihal');
            $table->string('nomor_agenda');
            $table->date('tanggal_disposisi');
            $table->unsignedBigInteger('orang_dituju_id')->nullable();
            $table->foreign('orang_dituju_id')->references('id')->on('orang_dituju');
            $table->unsignedBigInteger('jenis_disposisi_id');
            $table->foreign('jenis_disposisi_id')->references('id')->on('jenis_disposisi');
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
        Schema::dropIfExists('disposisi');
    }
}
