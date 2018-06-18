<!-- Page-Title -->
<div class="row">
    <div class="col-sm-12">
        <h4 class="page-title">Modificar Contraseña</h4>
    </div>
</div>


<div class="row">
    <div class="col-sm-12">
        <div class="card-box table-responsive">
   
                <?= $this->Form->create($agent,['url' => ['controller' => 'agents','action' => 'changePassword'], 'class' => 'form-horizontal m-t-20']); ?>
                    <div class="form-group ">
                        <div class="col-xs-12">
                            <?= $this->Form->password('old_password',['class' => 'form-control', 'placeholder' => 'Contraseña Actual']); ?>
                            <?= $this->Form->error('old_password'); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <?= $this->Form->password('new_password',['class' => 'form-control', 'placeholder' => 'Nueva Contraseña']); ?>
                            <?= $this->Form->error('new_password'); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <?= $this->Form->password('confirm_password',['class' => 'form-control', 'placeholder' => 'Repita la Contraseña']); ?>
                            <?= $this->Form->error('confirm_password'); ?>
                        </div>
                    </div>
                    <?= $this->Form->button('Aceptar',['class' => 'btn btn-success waves-effect w-md waves-light m-b-5 pull-right']); ?>

                    <button type="button" class="btn btn-default waves-effect pull-right m-r-10">Cancelar</button>

                <?= $this->Form->end();?>

        </div>
    </div><!-- end col -->
</div>
<!-- end row -->