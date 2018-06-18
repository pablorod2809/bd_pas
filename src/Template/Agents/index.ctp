<!-- Page-Title -->
<div class="row">
    <div class="col-sm-12">
         <div class="btn-group pull-right m-t-15">
            <?= $this->Html->link('Nuevo Usuario<span class="m-l-5"><i class="fa fa-plus"></i></span>',
                        ['controller' => 'employees', 'action' => 'add'],
                        ['escape' => false, 'class' => 'btn btn-custom waves-effect waves-light']); ?>
		</div>
        <h4 class="page-title">Administrar Usuarios</h4>
    </div>
</div>


<div class="row">
    <div class="col-sm-12">
        <div class="card-box table-responsive">
        	<table id="datatable" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>Legajo</th>
						<th>Nombre y Apellido</th>
						<th>Usuario</th>
						<th>Email</th>
						<th>Tipo</th>
                        <th>Estado</th>
						<th>&nbsp;</th>
                    </tr>
                </thead>
                <tbody>
                	<?php foreach($employees as $employee): ?>
						<tr>
							<td><?= $employee->file_number; ?></td>
							<td><?= $employee->employee_name; ?></td>
							<td><?= $employee->username; ?></td>
							<td><?= $employee->email; ?></td>
							<td><?= $employee->user_type; ?></td>
                            <td><?= $employee->activeDescription ?></td>
							<td>
                                <?= $this->Html->link('<i class="fa fa-pencil fa-lg text-muted m-r-5 table-button-edit"></i>',
                                                    ['action' => 'edit', $employee->id],
                                                    ['escape' => false]); ?>
                                <?= $this->Form->postLink('<i class="fa fa-times fa-lg text-muted table-button-delete"></i>',
                                                    ['action' => 'delete', $employee->id],
                                                    ['confirm' => 'Eliminar usuario ?','escape' => false]); ?>
										
							</td>
						</tr>
                	<?php endforeach; ?> 	
                </tbody>
            </table>
        </div>
    </div><!-- end col -->
</div>
<!-- end row -->




<script type="text/javascript">
    $(document).ready(function() {
        $('#datatable').DataTable();

        /* Aceptar Modal form */
        $("#button-accept").click(function(e){
        	e.preventDefault();
        	$("#user-form").submit();
        	$("#user-add").hide();
        });
    });
</script>    
                