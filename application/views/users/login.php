<p>
    <?php echo $this->session->flashdata('verify_msg'); ?>
</p>
<style>
    p {
        margin: 0 0 0px;
    }
</style>
<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="login-panel panel panel-default">
                <?php if($this->session->flashdata('msg_success')) { ?>
                    <div class="alert alert-success">
                         <?php echo $this->session->flashdata('msg_success'); ?>       
                    </div>
                 <?php } ?>
                 <?php if($this->session->flashdata('msg_error')) { ?>
                    <div class="alert alert-danger">
                         <?php echo $this->session->flashdata('msg_error'); ?>       
                    </div>
                <?php } ?>
                <div class="panel-heading">
                    <h3 class="panel-title">Por favor, inicie sesión</h3>
                </div>
                <div class="panel-body">
                    <?php $attributes = array("name" => "loginform", "role" => "form" );
                        echo form_open("users/login", $attributes);?>
                        <fieldset>
                            <div class="form-group <?php echo form_error('user') ? 'has-error' : '' ?>">
                                <label class="control-label" for="inputError"><?php echo form_error('user'); ?></label>
                                <input class="form-control" type="text" placeholder="Usuario" name="user" autofocus/>
                            </div>
                            <div class="form-group <?php echo form_error('password') ? 'has-error' : '' ?>">
                                <label class="control-label" for="inputError"><?php echo form_error('password'); ?></label>
                                <input class="form-control" placeholder="Contraseña" name="password" type="password" value="">
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input name="remember" type="checkbox" value="Remember Me">Recordar contraseña
                                </label>
                            </div>
                            <button class="btn btn-success btn-block">Iniciar sesión</button>
                            <div style="padding-top: 10px;">
                                <a href=""><label style="cursor: pointer;">Olvidó la contraseña</label></a> <a href="/users/register" class="pull-right"><label style="cursor: pointer;">Registrarse</label></a>
                            </div>
                        </fieldset>
                    <?php echo form_close(); ?>

                </div>
            </div>
        </div>
    </div>
</div>
