

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
@if(isset($commandeData))
    <script>
        
        const ctx = document.getElementById('commandeChart').getContext('2d');
        const data = @json($commandeData); // Données envoyées depuis le contrôleur

        const chart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: data.labels, // Labels des statuts
                datasets: [{
                    label: 'Répartition des commandes',
                    data: data.values, // Valeurs des commandes
                    backgroundColor: [
                        '#FF6384', // Couleur pour 'En attente'
                        '#36A2EB', // Couleur pour 'Livrée'
                        '#FFCE56', // Couleur pour 'Refusée'
                        '#4BC0C0', // Ajoutez d'autres couleurs si nécessaire
                    ],
                    borderColor: '#fff',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        display: true,
                        position: 'bottom',
                        labels: {
                            font: {
                                size: 14
                            },
                            color: '#333'
                        }
                    },
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                let label = context.label || '';
                                let value = context.raw || 0;
                                return `${label}: ${value} commandes`;
                            }
                        }
                    }
                }
            }
        });
        
    </script>
@endif


    <script>
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