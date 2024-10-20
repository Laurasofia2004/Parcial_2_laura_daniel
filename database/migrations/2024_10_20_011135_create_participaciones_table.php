<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('participaciones', function (Blueprint $table) {
            $table->id();
            $table->foreignId('evento_id')->constrained('eventos')->onDelete('cascade');
            $table->foreignId('organizador_id')->constrained('organizadores')->onDelete('cascade');
            $table->string('rol');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('participaciones');
    }
};
