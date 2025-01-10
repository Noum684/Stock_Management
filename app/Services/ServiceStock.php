<?php

namespace App\Services;

use App\Models\Produit;

class ServiceStock
{
    /**
     * Réduire le stock d'un produit.
     *
     * @param int $produitId
     * @param int $quantite
     * @return bool
     */
    public function diminuerStock(int $produitId, int $quantite): bool
    {
        $produit = Produit::find($produitId);

        if ($produit && $produit->quantite >= $quantite) {
            $produit->quantite -= $quantite;
            $produit->save();
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
    public function augmenterStock(int $produitId, int $quantite): bool
    {
        $produit = Produit::find($produitId);

        if ($produit) {
            $produit->quantite += $quantite;
            $produit->save();
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
    public function verifierDisponibilite(int $produitId, int $quantite): bool
    {
        $produit = Produit::find($produitId);

        return $produit && $produit->quantite >= $quantite;
    }
}
