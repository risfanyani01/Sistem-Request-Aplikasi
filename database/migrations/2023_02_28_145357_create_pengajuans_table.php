<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pengajuans', function (Blueprint $table) {
            $table->id();
            $table->biginteger('kategori_id')->unsigned();
                    //foreign
                    $table->foreign('kategori_id')
                    ->references('id')
                    ->on('kategoris')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');
            $table->biginteger('seksi_id')->unsigned();
                    //foreign
                    $table->foreign('seksi_id')
                    ->references('id')
                    ->on('seksis')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');
            $table->biginteger('departemen_id')->unsigned();
                    //foreign
                    $table->foreign('departemen_id')
                    ->references('id')
                    ->on('departemens')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');
            $table->string('nama_aplikasi');
            $table->longText('penjelasan');
            $table->enum('keterangan', ['diterima', 'proses', 'ditolak', 'pending', 'selesai'])->default('pending');
            $table->string('tanggal_pengajuan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengajuans');
    }
};
