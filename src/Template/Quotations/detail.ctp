<h4>Datos del Cliente</h4>
<div class="row">
    <div class="col-md-6">
        <p class="text-muted font-13 l-h-1"><strong>Nombre y Apellido:</strong> 
            <span class="m-l-15"><?=$quotation->customer->customer_name; ?></span>
        </p>
        <p class="text-muted font-13 l-h-1"><strong>Nacimiento:</strong> 
            <span class="m-l-15"><?=$quotation->customer->birthday; ?></span>
        </p>
        <p class="text-muted font-13 l-h-1"><strong>Dirección:</strong> 
            <span class="m-l-15"><?=$quotation->customer->address; ?></span>
        </p>

    </div>
    <div class="col-md-6">
        <p class="text-muted font-13 l-h-1"><strong>Documento:</strong>
            <span class="m-l-15"><?=$quotation->customer->document_number; ?></span>
        </p>
        <p class="text-muted font-13 l-h-1"><strong>Email:</strong> 
            <span class="m-l-15"><?=$quotation->customer->email; ?></span>
        </p>
        <p class="text-muted font-13 l-h-1"><strong>Telefono:</strong> <span class="m-l-15"><?=$quotation->customer->phone; ?></span></p>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <p class="text-muted font-13 l-h-1"><strong>Ciudad:</strong> 
            <span class="m-l-15 l-h-1"><?=!is_null($quotation->customer->place) ? $quotation->customer->place->description : ""; ?></span>
        </p>
        <p class="text-muted font-13 l-h-1"><strong>Llamarme:</strong> 
            <span class="m-l-15 l-h-1"><?=!is_null($quotation->customer) ? $quotation->customer->call_me_days : "".' '.!is_null($quotation->customer) ? $quotation->customer->call_me_hours : ""; ?></span>
        </p>
    </div>
</div>
<hr>
<h4>Datos del Vehículo</h4>
<div class="row">
    <div class="col-md-6">
        <p class="text-muted font-13 l-h-1"><strong>Marca:</strong> 
            <span class="m-l-15"><?=!is_null($quotation->companies_vehicle) ? $quotation->companies_vehicle->mark : ""; ?></span>
        </p>
        <p class="text-muted font-13 l-h-1"><strong>Versión:</strong>
            <span class="m-l-15"><?=!is_null($quotation->companies_vehicle) ? $quotation->companies_vehicle->version : ""; ?></span>
        </p>
    </div>
    <div class="col-md-6">
        <p class="text-muted font-13 l-h-1"><strong>Modelo:</strong> 
            <span class="m-l-15"><?=!is_null($quotation->companies_vehicle) ? $quotation->companies_vehicle->model : ""; ?></span>
        </p>
        <p class="text-muted font-13 l-h-1"><strong>Año:</strong> 
            <span class="m-l-15"><?=$quotation->vehicle_model; ?></span>
        </p>
    </div>
</div>
<hr>
<h4>Cobertura</h4>
<?php $i = 0;
    if(!empty($quotation->quotations_proposals)){
    foreach($quotation->quotations_proposals as $proposal){
        $i++;
?>
<div class="row">
    <div class="col-md-6">
        <p class="text-muted font-13 l-h-1"><strong>Opción <?=$i?>:</strong> 
            <span class="m-l-15"><?=$proposal->coverage?></span>
        </p>
    </div>
    <div class="col-md-6">
         <p class="text-muted font-13 l-h-1"><strong>Precio:</strong> 
            <span class="m-l-15"><?=$proposal->price?></span>
            <?php if($proposal->hired == 'T'){
                    if(is_null($proposal->emission_request)){ ?>
                        <span class="label label-primary m-l-15">Seleccionada</span>
                    <?php }else{ ?>
                        <span class="label label-success m-l-15">Emitida</span>
                    <?php } 
                }
            ?>
        </p>
    </div>
</div>

<?php }
    }else{ ?>
        <div class="col-md-6">
        <p class="text-muted font-13 l-h-1"><span class="m-l-15">No informado.</span>
        </p>
    </div>
 <?php } ?>