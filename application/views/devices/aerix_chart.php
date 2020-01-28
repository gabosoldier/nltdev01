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
                <canvas id="chart_luz"></canvas>
                <canvas id="chart_g4"></canvas>
                <script>
                    let datos = <?php echo json_encode($restapi); ?>;
                    
                    
                    var ctx_uv = document.getElementById('chart_uv').getContext("2d");
                    new Chart(ctx_uv, {
                        type: 'bar',
                        data: {
                            labels: ["uv"],
                            datasets: [
                                {
                                    maxBarThickness: 8,
                                    minBarLength: 0,
                                    label: "valor",
                                    backgroundColor: "blue",
                                    data: [datos.payload.d.uv]
                                },
                                {
                                    maxBarThickness: 8,
                                    minBarLength: 0,
                                    label: "tope",
                                    data: [20]
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

                    var ctx_tmp = document.getElementById('chart_tmp').getContext("2d");
                    new Chart(ctx_tmp, {
                        type: 'bar',
                        data: {
                            labels: ["temperatura"],
                            datasets: [
                                {
                                    maxBarThickness: 8,
                                    minBarLength: 0,
                                    label: "grados",
                                    backgroundColor: "blue",
                                    data: [datos.payload.d.temp]
                                },
                                {
                                    maxBarThickness: 8,
                                    minBarLength: 0,
                                    label: "tope",
                                    data: [100]
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
                            labels: ["humedad"],
                            datasets: [
                                {
                                    maxBarThickness: 8,
                                    minBarLength: 0,
                                    label: "valor",
                                    backgroundColor: "blue",
                                    data: [datos.payload.d.hum]
                                },
                                {
                                    maxBarThickness: 8,
                                    minBarLength: 0,
                                    label: "tope",
                                    data: [100]
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

                    var ctx_luz = document.getElementById('chart_luz').getContext("2d");
                    new Chart(ctx_luz, {
                        type: 'bar',
                        data: {
                            labels: ["luz"],
                            datasets: [
                                {
                                    maxBarThickness: 8,
                                    minBarLength: 0,
                                    label: "valor",
                                    backgroundColor: "blue",
                                    data: [datos.payload.d.p2]
                                },
                                {
                                    maxBarThickness: 8,
                                    minBarLength: 0,
                                    label: "tope",
                                    data: [100]
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

                    var ctx_amon = document.getElementById('chart_g4').getContext("2d");
                    new Chart(ctx_amon, {
                        type: 'bar',
                        data: {
                            labels: ["amoniaco"],
                            datasets: [
                                {
                                    maxBarThickness: 8,
                                    minBarLength: 0,
                                    label: "valor",
                                    backgroundColor: "blue",
                                    data: [datos.payload.d.p1]
                                },
                                {
                                    maxBarThickness: 8,
                                    minBarLength: 0,
                                    label: "tope",
                                    data: [100]
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