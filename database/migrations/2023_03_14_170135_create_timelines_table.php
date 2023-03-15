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
        Schema::create('timelines', function (Blueprint $table) {
            $table->id();
            $table->biginteger('pengajuan_id')->unsigned();
                    //foreign
                    $table->foreign('pengajuan_id')
                    ->references('id')
                    ->on('pengajuans')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');
            $table->string('nama_proses');
            $table->string('target_selesai');
            $table->string('tanggal_selesai');
            $table->enum('status', ['pending', 'proses', 'selesai'])->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('timelines');
    }
};
