

<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>
</di>

<footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span><p>&copy; 2024 Gestion de Stock. Tous droits réservés.</p></span>
        </div>
    </div>
</footer>
<!-- End of Footer -->

<!-- Bootstrap core JavaScript-->


<script src="/assets/vendor/jquery/jquery.min.js"></script>
<script src="/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="/assets/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="/assets/js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="/assets/vendor/chart.js/Chart.min.js"></script>

<!-- Page level custom scripts -->
<script src="/assets/js/demo/chart-area-demo.js"></script>
<script src="/assets/js/demo/chart-pie-demo.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('stocksChart').getContext('2d');
    const chart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Stock Critique', 'Quantité Totale'], // Noms des catégories
            datasets: [{
                label: 'Statistiques des Stocks',
                data: [{{ $stocksCritiques }}, {{ $totalQuantiteStock }}], // Données des stocks
                backgroundColor: ['rgba(255, 99, 132, 0.2)', 'rgba(54, 162, 235, 0.2)'],
                borderColor: ['rgba(255, 99, 132, 1)', 'rgba(54, 162, 235, 1)'],
                borderWidth: 1
            }]
        }
    });
    const data = {
        labels: ['Livrées', 'En Attente', 'Refusées'],
        datasets: [{
            label: 'Statistiques des Commandes',
            data: [{{ $livrees }}, {{ $enAttente }}, {{ $refusees }}],
            backgroundColor: ['#28a745', '#ffc107', '#dc3545'], // Couleurs pour chaque statut
            borderColor: ['#28a745', '#ffc107', '#dc3545'],
            borderWidth: 1
        }]
    };

    // Configuration du graphique
    const config = {
        type: 'pie',
        data: data,
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'top',
                },
                tooltip: {
                    callbacks: {
                        label: function(tooltipItem) {
                            let total = data.datasets[0].data.reduce((a, b) => a + b, 0);
                            let value = data.datasets[0].data[tooltipItem.dataIndex];
                            let percentage = ((value / total) * 100).toFixed(2);
                            return `${tooltipItem.label}: ${value} (${percentage}%)`;
                        }
                    }
                }
            }
        },
    };

    // Initialiser Chart.js
    const ctx = document.getElementById('pieChart').getContext('2d');
    new Chart(ctx, config);
</script>

</body>

</html>