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
        Schema::create('transfert', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('produit_id');
            $table->unsignedBigInteger('point_vente_id'); // Destination du transfert
            $table->integer('quantite');
            $table->enum('statut', ['en_attente', 'approuvé', 'rejeté'])->default('en_attente');
            $table->timestamps();

            $table->foreign('produit_id')->references('id')->on('produit')->onDelete('cascade');
            $table->foreign('point_vente_id')->references('id')->on('point_vente')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transfert');
    }
};
