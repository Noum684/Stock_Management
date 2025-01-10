<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Produit;
use App\Services\ServiceStock;

class StockServiceTest extends TestCase
{
    public function testDiminuerStock()
    {
        $produit = Produit::factory()->create(['quantite' => 50]);
        $stockService = new ServiceStock();

        $result = $stockService->diminuerStock($produit->id, 10);

        $this->assertTrue($result);
        $this->assertEquals(40, $produit->fresh()->quantite);
    }

    public function testVerifierDisponibilite()
    {
        $produit = Produit::factory()->create(['quantite' => 10]);
        $stockService = new ServiceStock();

        $result = $stockService->verifierDisponibilite($produit->id, 5);

        $this->assertTrue($result);
    }
}
