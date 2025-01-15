<?php

namespace App\Services;

use App\Models\Stock;

class ServiceStock
{
    /**
     * Réduire le stock d'un produit.
     *
     * @param int $stockId
     * @param int $quantite
     * @return bool
     */
    public function diminuerStock(int $stockId, int $quantite): bool
    {
        $stock = Stock::find($stockId);

        if ($stock && $stock->quantite >= $quantite) {
            $stock->quantite -= $quantite;
            $stock->save();
            return true;
        }

        return false; // Stock insuffisant
    }

    /**
     * Augmenter le stock d'un produit.
     *
     * @param int $produitId
     * @param int $quantite
     * @return bool
     */
    public function augmenterStock(int $stockId, int $quantite): bool
    {
        $stock = Stock::find($stockId);

        if ($stock) {
            $stock->quantite += $quantite;
            $stock->save();
            return true;
        }

        return false; // Produit non trouvé
    }

    /**
     * Vérifier la disponibilité du stock pour un produit.
     *
     * @param int $produitId
     * @param int $quantite
     * @return bool
     */
    public function verifierDisponibilite(int $stockId, int $quantite): bool
    {
        $stock = Stock::find($stockId);

        return $stock && $stock->quantite >= $quantite;
    }
}
