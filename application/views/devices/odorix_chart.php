<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header"><?php echo $title; ?></h3>
        </div>
    </div>
    <div class="row">
        <div class="box-body">
            <div class="chart">
                <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
                <canvas id="chart_uv" style="height:250px"></canvas>
                <canvas id="chart_tmp" style="height:250px"></canvas>
                <canvas id="chart_hum"></canvas>
                <canvas id="chart_pm10"></canvas>
                <canvas id="chart_pm25"></canvas>
                <canvas id="chart_lmin"></canvas>
                <canvas id="chart_lmax"></canvas>
                <canvas id="chart_leq"></canvas>
                <script>
                    let datos = <?php echo json_encode($restapi); ?>;
                    let dato_uv = [];
                    let dato_tmp = [];
                    let dato_hum = [];
                    let dato_pm10 = [];
                    let dato_pm25 = [];
                    let dato_lmin = [];
                    let dato_lmax = [];
                    let dato_leq = [];
                    let hora = [];
                    datos.forEach(dato => {
                        dato_uv.push(dato.uv);
                        dato_tmp.push(dato.temperatura);
                        dato_hum.push(dato.humedad);
                        dato_pm10.push(dato.pm10);
                        dato_pm25.push(dato.pm25);
                        dato_lmin.push(dato.ruido_min);
                        dato_lmax.push(dato.ruido_max);
                        dato_leq.push(dato.ruido_prom);
                        hora.push(dato.hora);
                    })

                    var ctx_uv = document.getElementById('chart_uv').getContext("2d");
                    new Chart(ctx_uv, {
                        type: 'bar',
                        data: {
                            labels: hora,
                            datasets: [
                                {
                                    maxBarThickness: 8,
                                    minBarLength: 0,
                                    label: "valor",
                                    backgroundColor: "blue",
                                    fill: 'start',
                                    pointRadius: 5,
                                    pointHoverRadius: 10,
                                    borderDash: [5, 5],                                    
                                    data: dato_uv
                                }

                            ]
                        },
                        options: {
                            maintainAspectRatio: false,
                            scales: {
                                yAxes: [{
                                    display: true,
                                    ticks: {
                                        //beginAtZero: true,
                                        suggestedMax: 85,
                                        suggestedMin: -40
                                    }
                                }]
                            }
                        }
                    });

                    var ctx_tmp = document.getElementById('chart_tmp').getContext("2d");
                    new Chart(ctx_tmp, {
                        type: 'bar',
                        data: {
                            labels: hora,
                            datasets: [
                                {
                                    maxBarThickness: 8,
                                    minBarLength: 0,
                                    label: "grados",
                                    backgroundColor: "blue",
                                    data: dato_tmp
                                }
                            ]
                        },
                        options: {
                            scales: {
                                yAxes: [{
                                    ticks: {
                                        beginAtZero: true
                                    }
                                }]
                            }
                        }
                    });

                    var ctx_hum = document.getElementById('chart_hum').getContext("2d");
                    new Chart(ctx_hum, {
                        type: 'bar',
                        data: {
                            labels: hora,
                            datasets: [
                                {
                                    maxBarThickness: 8,
                                    minBarLength: 0,
                                    label: "valor",
                                    backgroundColor: "blue",
                                    data: dato_hum
                                }
                            ]
                        },
                        options: {
                            scales: {
                                yAxes: [{
                                    ticks: {
                                        beginAtZero: true
                                    }
                                }]
                            }
                        }
                    });

                    var ctx_pm10 = document.getElementById('chart_pm10').getContext("2d");
                    new Chart(ctx_pm10, {
                        type: 'bar',
                        data: {
                            labels: hora,
                            datasets: [
                                {
                                    maxBarThickness: 8,
                                    minBarLength: 0,
                                    label: "valor",
                                    backgroundColor: "blue",
                                    data: dato_pm10
                                }
                            ]
                        },
                        options: {
                            scales: {
                                yAxes: [{
                                    ticks: {
                                        beginAtZero: true
                                    }
                                }]
                            }
                        }
                    });

                    var ctx_pm25 = document.getElementById('chart_pm25').getContext("2d");
                    new Chart(ctx_pm25, {
                        type: 'bar',
                        data: {
                            labels: hora,
                            datasets: [
                                {
                                    maxBarThickness: 8,
                                    minBarLength: 0,
                                    label: "valor",
                                    backgroundColor: "blue",
                                    data: dato_pm25
                                }                           
                            ]
                        },
                        options: {
                            scales: {
                                yAxes: [{
                                    ticks: {
                                        beginAtZero: true
                                    }
                                }]
                            }
                        }
                    });

                    var ctx_lmin = document.getElementById('chart_lmin').getContext("2d");
                    new Chart(ctx_lmin, {
                        type: 'bar',
                        data: {
                            labels: hora,
                            datasets: [
                                {
                                    maxBarThickness: 8,
                                    minBarLength: 0,
                                    label: "valor",
                                    backgroundColor: "blue",
                                    data: dato_ruido_min
                                }

                            ]
                        },
                        options: {
                            scales: {
                                yAxes: [{
                                    ticks: {
                                        beginAtZero: true
                                    }
                                }]
                            }
                        }
                    });

                    var ctx_lmax = document.getElementById('chart_lmax').getContext("2d");
                    new Chart(ctx_lmax, {
                        type: 'bar',
                        data: {
                            labels: hora,
                            datasets: [
                                {
                                    maxBarThickness: 8,
                                    minBarLength: 0,
                                    label: "valor",
                                    backgroundColor: "blue",
                                    data: dato_ruido_max
                                }
                            ]
                        },
                        options: {
                            scales: {
                                yAxes: [{
                                    ticks: {
                                        beginAtZero: true
                                    }
                                }]
                            }
                        }
                    });

                    var ctx_leq = document.getElementById('chart_leq').getContext("2d");
                    new Chart(ctx_leq, {
                        type: 'bar',
                        data: {
                            labels: hora,
                            datasets: [
                                {
                                    maxBarThickness: 8,
                                    minBarLength: 0,
                                    label: "valor",
                                    backgroundColor: "blue",
                                    data: dato_ruido_prom
                                }
                            ]
                        },
                        options: {
                            scales: {
                                yAxes: [{
                                    ticks: {
                                        beginAtZero: true
                                    }
                                }]
                            }
                        }
                    });

                </script>
            </div>
        </div>
    </div>
</div>        
