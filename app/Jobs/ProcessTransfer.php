<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use App\Models\Stock;

class ProcessTransfer implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    protected $produit;
    protected $quantite;
    protected $pointVenteId;

    public function __construct($produit, $quantite, $pointVenteId)
    {
        $this->produit = $produit;
        $this->quantite = $quantite;
        $this->pointVenteId = $pointVenteId;
    }

    public function handle()
    {
        $stock = Stock::where('produit_id', $this->produit->id)
                      ->where('point_vente_id', $this->pointVenteId)
                      ->first();

        $stock->increment('quantite', $this->quantite);
    }
}
