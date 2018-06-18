<div class="account-pages">
    <div class="animationload">
        <div class="loader"></div>
    </div>
</div>
<div class="clearfix"></div>
    
    <div class="wrapper-page">
        <div class="text-center">
            <a href="index.html" class="logo"><span>Broker<span>Digital</span></span></a>
            <h5 class="text-muted m-t-0 font-600">Backoffice Productores de Seguro</h5>
        </div>
        <div class="m-t-40 card-box">
            <div class="text-center">
                <h4 class="text-uppercase font-bold m-b-0">Ingresar</h4>
            </div>
            <div class="panel-body">
            <?= $this->Flash->render('auth') ?>
              <?= $this->Form->create('',['class' => 'form-horizontal m-t-20']); ?>
                    <div class="form-group ">
                        <div class="col-xs-12">
                            <input class="form-control" name="enrollment" required="" placeholder="Matrícula" type="text">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-xs-12">
                            <input class="form-control" name="password" required="" placeholder="Password" type="password">
                        </div>
                    </div>

                    <div class="form-group text-center m-t-30">
                        <div class="col-xs-12">
                            <button class="btn btn-custom btn-bordred btn-block waves-effect waves-light" type="submit">Ingresar</button>
                        </div>
                    </div>
                    
                    <div class="form-group m-t-30 m-b-0">
                        <div class="col-sm-12">
                            <a href="" id="" class="text-muted" data-toggle="modal" data-target="#forgot-pass-modal">
                                <i class="fa fa-lock m-r-5"></i>¿Olvidaste tu contraseña?
                            </a>
                        </div>
                    </div>
                <?= $this->Form->end();?>

            </div>
        </div>
        <!-- end card-box-->
    </div>
    <!-- end wrapper page -->

    <div id="forgot-pass-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title" id="mySmallModalLabel">Recuperar Contraseña</h4>
                </div>
                <div class="modal-body">
                    <p>Ingrese el email con el que se encuentra registrado en el sistema. Una nueva contraseña será enviada a su casilla de correo.</p>
                    <div class="row">
                         <div class="form-group ">
                            <div class="col-xs-12">
                                <input class="form-control" name="email" required="" placeholder="Email" type="text">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" id="close-modal" class="btn btn-default waves-effect" data-dismiss="modal">Cerrar</button>
                    <button type="submit" id="change-pass" class="btn btn-primary waves-effect waves-light">Reestablecer Contraseña</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <div id="success-pass-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title" id="mySmallModalLabel">Contraseña Generada</h4>
                </div>
                <div class="modal-body">
                    <p></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Cerrar</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

<script>
    $(document).ready(function() {
        $("#change-pass").click(function(e){
            e.preventDefault();
            $(".animationload").show();
            var email = $("[name=email]").val();
            $.post("/bd_pas/brokers/recovery-password",{email: email}, function(msg){
                $("#close-modal").click();
                $("#success-pass-modal .modal-body p").html(msg);
                $("[name=email]").val('');
                $(".animationload").hide();
                $("#success-pass-modal").modal('show');
            });
        });
    }); 
</script>
   
</body>
</html>