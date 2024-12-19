namespace App\Services;

use App\Models\Stock;

class StockService
{
    public function updateStock($stockId, $data)
    {
        $stock = Stock::findOrFail($stockId);
        $stock->update($data);

        activity()
            ->causedBy(auth()->user())
            ->performedOn($stock)
            ->withProperties(['updated_fields' => $data])
            ->log('Mise à jour du stock via le service');
    }
}
