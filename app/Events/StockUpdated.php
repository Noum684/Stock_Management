<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class StockUpdated
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $produit;
    public $quantite;

    /**
     * Create a new event instance.
     */
    public function __construct($produit,$quantite)
    {
        $this->produit = $produit; 
        $this->quantite = $quantite;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn(): array
    {
        return [
            new PrivateChannel('stock-channel'),
        ];
    }
    public function broadcastAs()
    {
        return 'stock.updated';
    }
}
