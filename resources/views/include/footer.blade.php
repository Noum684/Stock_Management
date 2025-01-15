

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
    
    document.addEventListener("DOMContentLoaded", function () {
        var ctx = document.getElementById('commandePieChart').getContext('2d');

        var data = {
            
            datasets: [{
               
                backgroundColor: [
                    '#FF6384',
                    '#36A2EB',
                    '#FFCE56',
                    '#4BC0C0',
                    '#9966FF'
                ],
                hoverBackgroundColor: [
                    '#FF6384',
                    '#36A2EB',
                    '#FFCE56',
                    '#4BC0C0',
                    '#9966FF'
                ]
            }]
        };

        new Chart(ctx, {
            type: 'pie',
            data: data,
        });
    });
    // Search script
    document.querySelector('#search-bar').addEventListener('input', function (e) {
    let query = e.target.value;

    axios.get(`/search?query=${query}`)
        .then(response => {
            const resultsDropdown = document.querySelector('#search-results');
            resultsDropdown.innerHTML = '';

            response.data.forEach(result => {
                const item = document.createElement('a');
                item.classList.add('dropdown-item');
                item.href = `/product/${result.id}`;
                item.textContent = result.name;

                resultsDropdown.appendChild(item);
            });

            if (query === '') {
                resultsDropdown.innerHTML = '';
            }
        })
        .catch(error => {
            console.error(error);
        });
});
//Message
function fetchMessages() {
    axios.get('/messages')
        .then(response => {
            const messageList = document.querySelector('#message-list');
            const messageCount = document.querySelector('#message-count');
            messageList.innerHTML = '';

            response.data.forEach(message => {
                const item = document.createElement('div');
                item.classList.add('dropdown-item');
                item.textContent = message.content;
                item.addEventListener('click', () => markAsRead(message.id));

                messageList.appendChild(item);
            });

            messageCount.textContent = response.data.length || '';
        })
        .catch(error => console.error(error));
}

function markAsRead(id) {
    axios.post(`/messages/read/${id}`)
        .then(() => fetchMessages())
        .catch(error => console.error(error));
}

// Appel initial pour charger les messages.
fetchMessages();


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