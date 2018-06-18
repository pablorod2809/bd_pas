<!-- Page-Title -->
<div class="row">
    <div class="col-sm-12">
        <div class="btn-group pull-right m-t-15"> 
            <?= $this->Html->link('Volver<span class="m-l-5"><i class="fa fa-mail-reply"></i></span>',
                        ['controller' => 'home'],
                        ['escape' => false, 'class' => 'btn btn-info dropdown-toggle waves-effect waves-light  m-r-5']); ?>
            <?= $this->Html->link('Exportar<span class="m-l-5"><i class="dripicons-export"></i></span>',
                        [$company_id, '_ext' => 'xlsx'],
                        ['escape' => false, 'class' => 'btn btn-success dropdown-toggle waves-effect waves-light']); ?>
		</div>
        <h4 class="page-title">Consulta de Cotizaciones</h4>
    </div>
</div>


<div class="row">
    <div class="col-sm-12">
        <div class="card-box table-responsive">
        	<table id="datatable" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>Fecha</th>
						<th>Asegurado</th>
						<th>Ciudad</th>
						<th>Vehículo</th>
                        <th>Modelo</th>
						<th>Estado</th>
                    </tr>
                </thead>
                <tbody>
                	<?php 
                        $i = 0;
                        foreach($quotations as $quotation): ?>
						<tr class="modal-detail" data-id="<?=$quotation->id?>">
							<td><?= $quotation->formatDate('dd/MM/yyyy', $quotation->contact_date); ?></td>
							<td><?= $quotation->customer->customer_name; ?></td>
							<td><?php if(!is_null($quotation->customer->place)) 
                                        echo $quotation->customer->place->description; 
                                      else 
                                        echo ""; 
                                ?>
                            </td>
							<td><?php if(!is_null($quotation->companies_vehicle)) 
                                        echo $quotation->companies_vehicle->vehicle; 
                                      else 
                                        echo ""; ?></td>
                            <td><?= $quotation->vehicle_model; ?></td>
							<td>
                                <span class="<?= $quotation->getStatus($quotation)['class']; ?>">
                                    <?= $quotation->getStatus($quotation)['name']; ?>
                                </span>
                            </td>
						</tr>
                	<?php 
                        $i++;
                        endforeach; ?> 	
                </tbody>
            </table>
        </div>
    </div><!-- end col -->
</div>
<!-- end row -->

<!-- modal content -->
<div id="quotation-detail-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="custom-width-modalLabel">Detalle de Cotización</h4>
            </div>
            <div class="modal-body">
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Cerrar</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<script type="text/javascript">
    $(document).ready(function() {
        $('#datatable').DataTable();


        $("body").on('click','.modal-detail', function(e){
            e.preventDefault();
            var id = $(this).data('id');
            $('#quotation-detail-modal .modal-body').html('');
            $.post('/bd_pas/quotations/detail', {quotationId: id}, 
                function(data)
                {
                    $('#quotation-detail-modal .modal-body').html(data);
                });
            $('#quotation-detail-modal').modal('show');
        });

    });
</script>    
                