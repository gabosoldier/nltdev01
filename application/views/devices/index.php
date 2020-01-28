<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-10">
            <h3 class="page-header"><?php echo $title; ?></h3>
        </div>
        <div class="col-lg-2">
            <a href="<?php echo site_url('device/create'); ?>" class="page-header btn btn-success pull-right">Agregar dispositivo</a>
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
                                    <th scope="col"></th>
                                    <th scope="col"></th>
                                    <th scope="col">#</th>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Descripción</th>
                                    <th scope="col">Sección</th>
                                    <th scope="col">Fecha último registro</th>
                                    <th scope="col">Hora último registro</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($devices as $device_item): ?>
                                <tr class="sub-container">
                                    <td>
                                        <a href="<?php echo site_url('device/detail/') . $device_item['nombre']; ?>" class="btn btn-info pull-right exploder">Detalle</a>
                                    </td>   
                                    <td>
                                        <a href="<?php echo site_url('device/showchart/') . $device_item['nombre']; ?>" class="btn btn-success pull-right subtabla">Estado API</a>
                                    </td> 
                                    <td><?php echo $i++; ?></td>
                                    <td><?php echo $device_item['nombre']; ?></td>
                                    <td><?php echo $device_item['descripcion']; ?></td>
                                    <td><?php echo $device_item['seccion']; ?></td>
                                    <td><?php echo $device_item['fecha']; ?></td>
                                    <td><?php echo $device_item['hora']; ?></td>
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
