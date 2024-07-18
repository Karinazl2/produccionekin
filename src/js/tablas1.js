
document.addEventListener('DOMContentLoaded', function () {
    const ctx1 = document.getElementById('myChart1').getContext('2d');
    const ctx2 = document.getElementById('myChart2').getContext('2d');

    // Función para crear gráfico de barras
    function createBarChart(ctx, labels, data, title) {
        return new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: title,
                    data: data,
                    backgroundColor: 'rgba(153, 0, 102, 1)', // Color de fondo para las barras
                    borderColor: 'rgba(153, 0, 102, 1)', // Color del borde de las barras
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
        fetch(`${server}/api/cremalleras`)  // Asegúrate de ajustar la URL de la API según tu entorno
            .then(response => response.json())
            .then(data => {
                const ordenesPorArea = {};
                const ordenesPorMaquina = {};

                // Contar órdenes por área y por máquina
                data.vista_cremalleras_ordenes.forEach(orden => {
                    const area = orden.nombre_area;
                    const maquina = orden.nombre_maquina;

                    // Filtrar áreas y máquinas "terminada" y "materia prima"
                    if (area !== 'TERMINADA' && area !== 'MATERIA PRIMA' &&
                        maquina !== 'TERMINADA' && maquina !== 'MATERIA PRIMA') {
                        // Contar por área
                        if (ordenesPorArea[area]) {
                            ordenesPorArea[area]++;
                        } else {
                            ordenesPorArea[area] = 1;
                        }

                        // Contar por máquina
                        if (ordenesPorMaquina[maquina]) {
                            ordenesPorMaquina[maquina]++;
                        } else {
                            ordenesPorMaquina[maquina] = 1;
                        }
                    }
                });

                // Preparar datos para el primer gráfico (órdenes por área)
                const labels1 = Object.keys(ordenesPorArea);
                const cantidades1 = Object.values(ordenesPorArea);

                // Crear el primer gráfico (órdenes por área)
                createBarChart(ctx1, labels1, cantidades1, 'Órdenes por Área');

                // Preparar datos para el segundo gráfico (órdenes por máquina)
                const labels2 = Object.keys(ordenesPorMaquina);
                const cantidades2 = Object.values(ordenesPorMaquina);

                // Crear el segundo gráfico (órdenes por máquina)
                createBarChart(ctx2, labels2, cantidades2, 'Órdenes por Máquina');

            })
            .catch(error => console.error('Error al obtener los datos:', error));
    }

    // Llamar a la función para obtener datos y crear gráficos
    fetchDataAndCreateCharts();
});