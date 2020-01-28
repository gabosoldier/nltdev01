<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-10">
            <h3 class="page-header"><?php echo $title; ?></h3>
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
                                    <th scope="col">ID</th>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Descripcion</th>
                                    <th scope="col">Hora último registro</th>
                                    <th scope="col">Fecha último registro</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php $i = 1;print_r($devicedet); ?>
                            <?php foreach ($devicedet as $device_item): ?>
                                <tr>
                                    <td><?php echo $i++; ?></td>
                                    <td><?php echo $device_item['id']; ?></td>
                                    <td><?php echo $device_item['nombre']; ?></td>
                                    <td><?php echo $device_item['descripcion']; ?></td>
                                    <td><?php echo $device_item['fecha']; ?></td>
                                    <td><?php echo $device_item['hora']; ?></td>
                                    <td>
                                        <a href="<?php echo site_url('device/view/' . $device_item['id']); ?>"><label
                                                    style="cursor: pointer;">Ver</label></a>
                                                    <?php if ($this->session->userdata('is_logged_in')) { ?>
                                            |
                                            <a href="<?php echo site_url('device/edit/' . $device_item['id']); ?>"><label
                                                        style="cursor: pointer;">Editar</label></a> |
                                            <a href="<?php echo site_url('device/delete/' . $device_item['id']); ?>"
                                               onClick="return confirm('Are you sure you want to delete?')">
                                                <label style="cursor: pointer;">Eliminar</label></a>
                                        <?php } // end if ?>
                                    </td>
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