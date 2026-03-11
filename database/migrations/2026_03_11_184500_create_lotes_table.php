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
            Schema::create('lotes', function (Blueprint $table) {

                $table->id();
                $table->string('modelo');
                $table->string('lote'); // formato aamm
                $table->string('estado')->default('pendiente');
                $table->text('observaciones')->nullable();
                $table->timestamps();

            });
        }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lotes');
    }
};
