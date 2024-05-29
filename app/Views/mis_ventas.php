<!DOCTYPE html>
<html lang="es">
<head>
    <?= $header?>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body class="d-flex flex-column min-vh-100">
    <div class="container pt-2 flex-grow-1">
        <div class="row mt-2">
            <div class="col-md-6 col-lg-6 col-xl-5">
                <div class="card mt-2">
                    <div class="card-body">
                        <h5 class="card-title">Montos a lo Largo del Tiempo</h5>
                        <canvas id="lineChart"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-5">
                <div class="card mt-2">
                    <div class="card-body">
                        <h5 class="card-title">Montos por Día</h5>
                        <canvas id="barChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 col-lg-6 col-xl-4">
                <div class="card mt-2">
                    <div class="card-body">
                        <h5 class="card-title">Distribución de Beneficios</h5>
                        <canvas id="pieChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script>
        // Supongamos que $validaciones es un array de objetos PHP
        var validaciones = <?=$validaciones?>;

        // Función para convertir los montos a números
        function convertMontos(data) {
            return data.map(item => parseFloat(item.monto));
        }

        // Función para formatear las fechas
        function formatDate(dateString) {
            var options = { year: 'numeric', month: 'short', day: 'numeric' };
            return new Date(dateString).toLocaleDateString('es-ES', options);
        }

        // Extraer datos
        var labels = validaciones.map(item => formatDate(item.fecha_creacion));
        var montos = convertMontos(validaciones);
        var beneficios = validaciones.map(item => item.beneficio);
        var socios = validaciones.map(item => item.email_socio);

        // Gráfico de Línea - Montos a lo Largo del Tiempo
        var ctxLine = document.getElementById('lineChart').getContext('2d');
        var lineChart = new Chart(ctxLine, {
            type: 'line',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Monto',
                    data: montos,
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

        // Gráfico de Barras - Montos por Día
        var ctxBar = document.getElementById('barChart').getContext('2d');
        var barChart = new Chart(ctxBar, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Monto',
                    data: montos,
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor: 'rgba(54, 162, 235, 1)',
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

        // Gráfico de Pastel - Distribución de Beneficios
        var uniqueBeneficios = [...new Set(beneficios)];
        var beneficiosCount = uniqueBeneficios.map(beneficio => 
            beneficios.filter(b => b === beneficio).length
        );

        var ctxPie = document.getElementById('pieChart').getContext('2d');
        var pieChart = new Chart(ctxPie, {
            type: 'pie',
            data: {
                labels: uniqueBeneficios,
                datasets: [{
                    label: 'Beneficios',
                    data: beneficiosCount,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            }
        });
    </script>
    <?= $footer ?>
</body>
</html>
