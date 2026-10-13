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
    Schema::create('tikets', function (Blueprint $table) {
        $table->id();
        $table->string('nama');
        $table->string('jenis');
        $table->string('asal');
        $table->string('tujuan');
        $table->time('berangkat');
        $table->time('tiba');
        $table->unsignedInteger('harga');
        $table->unsignedInteger('durasi');
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tikets');
    }
};
