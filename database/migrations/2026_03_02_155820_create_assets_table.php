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
    Schema::create('assets', function (Blueprint $table) {
        $table->id();
        $table->string('nama_asset');
        $table->string('kode_asset')->unique();
        $table->string('kategori');
        $table->string('lokasi');
        $table->enum('status', ['Tersedia', 'Dipinjam'])->default('Tersedia');
        $table->timestamps();
    });
}

public function down(): void
{
        Schema::dropIfExists('assets');
}
};
