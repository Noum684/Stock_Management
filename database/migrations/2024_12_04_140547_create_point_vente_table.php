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
        Schema::create('point_vente', function (Blueprint $table) {
            $table->unsignedBigInteger('id')->primary();
            $table->string('nom');
            $table->string('adresse');
            $table->unsignedBigInteger('responsable_id');
            $table->timestamps();

            $table->foreign('responsable_id')->references('id')->on('responsable')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('point_vente');
    }
};
