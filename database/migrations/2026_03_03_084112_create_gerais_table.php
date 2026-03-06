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
        Schema::create('gerais', function (Blueprint $table) {
            $table->id();
        $table->string('id_gerai')->unique();
        $table->string('nama');
        $table->text('alamat');
        $table->string('kota');
        $table->string('telepon');
        $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gerais');
    }
};
