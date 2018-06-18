<?= $this->Html->css(['/plugins/x-editable/dist/bootstrap3-editable/css/bootstrap-editable']) ?>
<?= $this->Html->css(['/plugins/select2/dist/css/select2','/plugins/select2/dist/css/select2-bootstrap']) ?>


<?= $this->Html->script(['/plugins/x-editable/dist/bootstrap3-editable/js/bootstrap-editable.min']) ?>
<?= $this->Html->script(['/plugins/moment/moment.js']) ?>
<?= $this->Html->script(['/plugins/select2/dist/js/select2.min']) ?>
 <!-- google maps api -->
<?= $this->Html->script(['http://maps.google.com/maps/api/js?key=AIzaSyCwiHYaB5Z8qH6NJNvmblo-abeiLHrV6Lw
']) ?>
<!-- main file -->
<?= $this->Html->script(['/plugins/gmaps/gmaps.min.js']) ?>
<!-- Init -->
<?= $this->Html->script(['/plugins/gmaps/jquery.gmaps.js']) ?>

<!-- Page-Title -->
<div class="row">
    <div class="col-sm-12">
        <h4 class="page-title">Administrar Mi Perfil</h4>
    </div>
</div>
<div class="row">
    <div class="col-sm-6">
        <div class="card-box">
            <div class="row text-center edit-img-div">
                <a href="#" id="edit-image">
                 <?= $this->Html->image('../../../companiesImg/'.$agent->photo, ["alt" => "Avatar", "class" => ['img-circle','thumb-xl','img-thumbnail','m-b-10 edit-img']]); ?>
                <div class="middle">
                    <i class="fa fa-pencil fa-2x"></i>
                </div>
                </a>
            </div>
            <div class="row text-center m-b-15" id="div-img-form" style="display: none;">
                <div class="col-lg-2"></div>
                <div class="col-lg-5" style="overflow: hidden;">
                    <?= $this->Form->create('avatar-form', ['url' => '/brokers/avatar','type' => 'file']) ?>
                    <?= $this->Form->file('image_file',['class' => 'form-control-file', 'label' => false, 'style' => "display: inline-block !important;" ]); ?>
                    <?=$this->Form->hidden('enrollment', ['value' => $agent->enrollment]); ?>
                </div>
                <div class="col-lg-4">
                    <?= $this->Form->button('<i class="fa fa-cloud-upload"></i> Subir',['class' => 'btn btn-icon waves-effect waves-light btn-primary m-b-5 m-l-10', 'escape' => false]); ?>
                    <?= $this->Form->end(); ?>
                </div>
                <div class="col-lg-1"></div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <form action="#" class="form-horizontal">
                        <div class="form-group m-b-10">
                             <label class="col-sm-4 control-label">Matrícula:</label>
                            <div class="col-sm-7">
                                <a href="#" id="enrollment" data-type="text" data-pk="<?=$agent->id?>" data-title="enrollment">
                                    <?=$agent->enrollment;?>
                                </a>
                            </div>
                            </div>
                        <div class="form-group m-b-10">
                            <label class="col-sm-4 control-label">Apellido:</label>
                            <div class="col-sm-7">
                                <a href="#" id="last_name" data-type="text" data-pk="<?=$agent->id?>" data-title="Nombre">
                                    <?=$agent->last_name;?>
                                </a>
                            </div>
                        </div>
                        <div class="form-group m-b-10">
                            <label class="col-sm-4 control-label">Nombre:</label>
                            <div class="col-sm-7">
                                <a href="#" id="first_name" data-type="text" data-pk="<?=$agent->id?>" data-title="Nombre">
                                    <?=$agent->first_name;?>
                                </a>
                            </div>
                        </div>
                        <div class="form-group m-b-10">
                            <label class="col-sm-4 control-label">Nacimiento:</label>
                            <div class="col-sm-7">
                                <a href="#" id="birthday" data-type="combodate" data-value="<?=$agent->formatDate('dd/MM/YYYY',$agent->birthday);?>" data-format="YYYY-MM-DD" data-viewformat="DD/MM/YYYY" data-template="D / MMM / YYYY" data-pk="<?=$agent->id?>"  data-title="Nacimiento">
                                </a>
                            </div>
                        </div>
                        <div class="form-group m-b-10">
                            <label class="col-sm-4 control-label">Teléfono:</label>
                            <div class="col-sm-7">
                                <a href="#" id="phone" data-type="text" data-pk="<?=$agent->id?>" data-title="Telefono">
                                    <?=$agent->phone;?>
                                </a>
                            </div>
                        </div>
                        <div class="form-group m-b-10">
                            <label class="col-sm-4 control-label">Email:</label>
                            <div class="col-sm-7">
                                <a href="#" id="email" data-type="text" data-pk="<?=$agent->id?>" data-title="Email">
                                    <?=$agent->email;?>
                                </a>
                            </div>
                        </div>
                        <div class="form-group m-b-10">
                            <label class="col-sm-4 control-label">Facebook:</label>
                            <div class="col-sm-7">
                                <a href="#" id="facebook" data-type="text" data-pk="<?=$agent->id?>" data-title="Facebook">
                                    <?=$agent->facebook;?>
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>                      
        </div>
    </div><!-- end col -->
    <div class="col-sm-6">
        <div class="card-box">
            <div class="row">
                <div class="col-lg-12">
                    <form action="#" class="form-horizontal">
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Dirección:</label>
                            <div class="col-sm-8">
                                <a href="#" id="address" data-type="text" data-pk="<?=$agent->id?>" data-title="Direccion">
                                    <?=$agent->address;?>
                                </a>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Ciudad:</label>
                            <div class="col-sm-8">
                                <a href="#" id="place_id" data-type="select" data-pk="<?=$agent->id?>" data-value="<?=$agent->place->id;?>" data-title="Seleccione"></a>
                            </div>
                        </div>
                    </form>
                   <div id="gmaps-markers" class="gmaps" data-lng="<?=$map['lng']?>" data-lat="<?=$map['lat']?>"></div>
                </div>
            </div>

        </div>
    </div><!-- end col -->
</div>
<!-- end row -->

<div class="row">
    <div class="col-sm-12">
        <div class="card-box">
            <div class="row">
                <div class="col-lg-12">
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Zonas de Coberturas:</label>
                        <div class="col-sm-10">
                            <a href="#" id="zones" data-type="text" data-pk="<?=$agent->id?>" data-title="Direccion">
                                <?=$companiesAgents->all_cities;?>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div><!-- end col -->
</div>
<!-- end row -->

<script type="text/javascript">

$(function(){

    var saveUrl = '<?= $this->url->build(["controller" => "brokers","action" => "profile"]); ?>';

    //modify buttons style
    $.fn.editableform.buttons = 
    '<button type="submit" class="btn btn-primary editable-submit btn-sm waves-effect waves-light"><i class="zmdi zmdi-check"></i></button>' +
    '<button type="button" class="btn editable-cancel btn-sm waves-effect"><i class="zmdi zmdi-close"></i></button>';
    
    //editables 
    $('#last_name, #first_name, #email, #facebook, #phone, #birthday').editable({
          validate: function(value) {
           if($.trim(value) == '') return 'Campo Obligatorio';
         },
         mode: 'inline',
         emptytext: 'No Informado',
         url: saveUrl,
         ajaxOptions: {
            type: 'post'
        }
    });

    var mapUrl = '<?= $this->url->build(["controller" => "brokers","action" => "getmap"]); ?>';

    $('#address').editable({
          validate: function(value) {
           if($.trim(value) == '') return 'Campo Obligatorio';
         },
         mode: 'inline',
         emptytext: 'No Informado',
         url: saveUrl,
         ajaxOptions: {
            type: 'post'
        },
        success: function(response, newValue) {
            $('#gmaps-markers').data('lat',response.lat);
            $('#gmaps-markers').data('lng',response.lng);
                $.GoogleMap.init()
        }
    });
    


    var placesUrl = '<?= $this->url->build(["controller" => "brokers","action" => "places"]); ?>';

    //remote source (simple)
    $('#place_id').editable({
        source: placesUrl,
        select2: {
            placeholder: 'Seleccione Ciudad',
            minimumInputLength: 4
        },
         mode: 'inline',
         emptytext: 'No Informado',
        url: saveUrl,
        success: function(response, newValue) {
            $('#gmaps-markers').data('lat',response.lat);
            $('#gmaps-markers').data('lng',response.lng);
            $.GoogleMap.init()
    }
    });

    $('#enrollment, #zones').editable({
     disabled: true
   });

    // Edición de imagen
    $("#edit-image").click(function(e){
        e.preventDefault();
        $("#div-img-form").show();
    });


});

</script>  
   
                