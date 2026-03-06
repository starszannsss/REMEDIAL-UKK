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
        Schema::create('barangs', function (Blueprint $table) {
        $table->string('id_barang')->unique();
        $table->enum('kategori',['Makanan','Kosmetik','Aksesoris']);
        $table->string('nama_barang');
        $table->integer('harga');
        $table->integer('stok');
        $table->string('suplier', 10);
        $table->foreign('suplier')->references('id_suplier')->on('supliers')->onDelete('cascade');
        $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('barangs');
    }
};
