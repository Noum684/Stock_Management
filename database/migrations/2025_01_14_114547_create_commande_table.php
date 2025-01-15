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
        Schema::create('commande', function (Blueprint $table) {
            $table->id();
            $table->integer('quantite');
            $table->unsignedBigInteger('produit_id');
            $table->foreign('produit_id')->references('id')->on('produit')->onDelete('cascade');
            $table->unsignedBigInteger('source_point_vente_id');
            $table->foreign('source_point_vente_id')->references('id')->on('point_vente')->onDelete('cascade');
            $table->unsignedBigInteger('destination_point_vente_id');
            $table->foreign('destination_point_vente_id')->references('id')->on('point_vente')->onDelete('cascade');
            $table->enum('status',['En attente','Refusée','Livrée']);
            $table->timestamps();
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('commande');
    }
};
