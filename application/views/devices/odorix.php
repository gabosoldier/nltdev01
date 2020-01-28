<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-10">
            <h3 class="page-header"><?php echo $title; ?></h3>
        </div>
        <div class="col-lg-2">
            <a href="<?php echo site_url('excel123/test'); ?>" class="page-header btn btn-success pull-right">Save to Excel</a>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <?php echo $title; ?>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">date</th>
                                    <th scope="col">hour</th>
                                    <th scope="col">device id</th>
                                    <th scope="col">temp</th>
                                    <th scope="col">uv</th>
                                    <th scope="col">p2</th>
                                    <th scope="col">p1</th>
                                    <th scope="col">lmin</th>
                                    <th scope="col">lmax</th>
                                    <th scope="col">ligth</th>
                                    <th scope="col">leq</th>
                                    <th scope="col">hum</th>
                                    <th scope="col">g1</th>
                                    <th scope="col">g2</th>
                                    <th scope="col">bs</th>
                                    <th scope="col">aqi</th>
                                    <th scope="col">aqi msg</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($odorix as $item): ?>
                                <tr>
                                    <td><?php echo $item['disp_tipo_id']; ?></td>
                                    <td><?php echo $item['fecha']; ?></td>
                                    <td><?php echo $item['hora']; ?></td>
                                    <td><?php echo $item['dev_id']; ?></td>
                                    <td><?php echo $item['temperatura']; ?></td>
                                    <td><?php echo $item['uv']; ?></td>
                                    <td><?php echo $item['pm25']; ?></td>
                                    <td><?php echo $item['pm10']; ?></td>
                                    <td><?php echo $item['ruido_min']; ?></td>
                                    <td><?php echo $item['ruido_max']; ?></td>
                                    <td><?php echo $item['luz']; ?></td>
                                    <td><?php echo $item['ruido_prom']; ?></td>
                                    <td><?php echo $item['humedad']; ?></td>
                                    <td><?php echo $item['co']; ?></td>
                                    <td><?php echo $item['co2']; ?></td>
                                    <td><?php echo $item['bateria']; ?></td>
                                    <td><?php echo $item['aqi']; ?></td>
                                    <td><?php echo $item['aqi_msg']; ?></td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>