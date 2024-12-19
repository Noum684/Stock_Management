@extends('layout')

@section('content')
<div class="container">
    <h1>Statistiques</h1>

    <div class="row">
        <div class="col-md-6">
            <h3>Total Produits : {{ $totalProduits }}</h3>
            <h3>Total Commandes : {{ $totalCommandes }}</h3>
        </div>
        <div class="col-md-6">
            <canvas id="produitsPopulairesChart"></canvas>
        </div>
    </div>

    <div class="row mt-5">
        <h3>Stocks par Point de Vente</h3>
        <table class="table">
            <thead>
                <tr>
                    <th>Produit</th>
                    <th>Stock</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($stocks as $stock)
                    <tr>
                        <td>{{ $stock->nom }}</td>
                        <td>{{ $stock->stock }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const produitsPopulairesData = @json($produitsPopulaires);

    const labels = produitsPopulairesData.map(item => `Produit ID: ${item.produit_id}`);
    const data = produitsPopulairesData.map(item => item.total_vendu);

    const ctx = document.getElementById('produitsPopulairesChart').getContext('2d');
    const produitsPopulairesChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: labels,
            datasets: [{
                label: 'Produits les plus vendus',
                data: data,
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>
@endsection
