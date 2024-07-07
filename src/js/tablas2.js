
document.addEventListener('DOMContentLoaded', function () {
    const ctx1 = document.getElementById('myChart1').getContext('2d');

    // Función para crear gráfico de barras
    function createBarChart(ctx, labels, data, title) {
        return new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: title,
                    data: data,
                    backgroundColor: 'rgba(255, 64, 0, 1)', // Color de fondo para las barras
                    borderColor: 'rgba(255, 64, 0, 1)', // Color del borde de las barras
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true // Empezar el eje y desde cero
                    }
                }
            }
        });
    }

    // Función para obtener y procesar los datos de la API
    function fetchDataAndCreateCharts() {
        const server = window.location.origin;
        fetch(`${server}/api/afilado`)  // Asegúrate de ajustar la URL de la API según tu entorno
            .then(response => response.json())
            .then(data => {
                const ordenesPorMaquina = {};

                // Contar órdenes por máquina
                data.vista_afilado_ordenes.forEach(orden => {
                    const area = orden.nombre_area;
                    const maquina = orden.nombre_maquina;

                    // Filtrar áreas y máquinas "TERMINADA" y "MATERIA PRIMA"
                    if (area !== 'TERMINADA' && area !== 'MATERIA PRIMA' &&
                        maquina !== 'TERMINADA' && maquina !== 'MATERIA PRIMA') {
                        
                        // Contar por máquina
                        if (ordenesPorMaquina[maquina]) {
                            ordenesPorMaquina[maquina]++;
                        } else {
                            ordenesPorMaquina[maquina] = 1;
                        }
                    }
                });

                // Preparar datos para el gráfico (órdenes por máquina)
                const labels = Object.keys(ordenesPorMaquina);
                const cantidades = Object.values(ordenesPorMaquina);

                // Crear el gráfico (órdenes por máquina)
                createBarChart(ctx1, labels, cantidades, 'Órdenes por Máquina');
            })
            .catch(error => console.error('Error al obtener los datos:', error));
    }

    // Llamar a la función para obtener datos y crear gráficos
    fetchDataAndCreateCharts();
});