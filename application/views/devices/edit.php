<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-10">
            <h3 class="page-header"><?php echo $title; ?></h3>
        </div>
        <div class="col-lg-2">
            <a href="<?php echo site_url('device'); ?>" class="page-header btn btn-success pull-right">News List</a>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading"><?php echo $title; ?></div>
                <?php $attributes = array("name" => "newsform", "role" => "form"); ?>
                <?php echo form_open_multipart('device/edit', $attributes); ?>
                <div class="panel-body">
                <div class="form-group <?php echo form_error('id') ? 'has-error' : '' ?>">
                    <label class="control-label"> Enter Id</label>
                    <input name="id" value="<?= $device_item['id'] ?>" placeholder="Enter Id" class="form-control">
                </div>
                <div class="form-group <?php echo form_error('name') ? 'has-error' : '' ?>">
                    <label class="control-label"> Enter Name</label>
                    <input name="name" value="<?= $device_item['nombre'] ?>" placeholder="Eneter name" class="form-control">
                </div>
                <div class="form-group <?php echo form_error('description') ? 'has-error' : '' ?>">
                    <label class="control-label">Enter description</label>
                    <textarea name="description" value="<?= $device_item['descripcion'] ?>" placeholder="Enter description" class="form-control"></textarea>
                </div>
                <div class="form-group <?php echo form_error('date') ? 'has-error' : '' ?>">
                    <label class="control-label">Enter date</label>
                    <textarea name="date" value="<?= $device_item['fecha'] ?>" placeholder="Enter date" class="form-control"></textarea>
                </div>
                <div class="form-group <?php echo form_error('hour') ? 'has-error' : '' ?>">
                    <label class="control-label">Enter Hour</label>
                    <textarea name="hour" value="<?= $device_item['hora'] ?>" placeholder="Enter Hour" class="form-control"></textarea>
                </div>
                <div class="form-group <?php echo form_error('userid') ? 'has-error' : '' ?>">
                    <label class="control-label">Enter user id</label>
                    <textarea name="userid" value="<?= $device_item['usuario_id'] ?>" placeholder="Enter user id" class="form-control"></textarea>
                </div>
                <input type="hidden" name="user_id" value="<?php echo $user_id; ?>"/>
                <button type="submit" name="submit" class="btn btn-success">Submit</button>
                <a href="<?php echo site_url('device'); ?>" class="btn btn-warning">Reset</a>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</div>
