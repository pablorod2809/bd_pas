<!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <h4 class="page-title">Compañias Asociadas</h4>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="card-box widget-user">
                            <div class="text-center">
                                <h2 class="text-custom" data-plugin="counterup"><?=$estadisticas['contacts']; ?></h2>
                                <h5>Contactos Totales</h5>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="card-box widget-user">
                            <div class="text-center">
                                <h2 class="text-pink" data-plugin="counterup"><?=$estadisticas['fast_quotations']; ?></h2>
                                <h5>Cotizaciones Rápidas</h5>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="card-box widget-user">
                            <div class="text-center">
                                <h2 class="text-warning" data-plugin="counterup"><?=$estadisticas['detail_quotations']; ?></h2>
                                <h5>Cotizaciones Detalladas</h5>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="card-box widget-user">
                            <div class="text-center">
                                <h2 class="text-info" data-plugin="counterup"><?=$estadisticas['emission_request']; ?></h2>
                                <h5>Solicitudes de Emisión</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end row -->

               <div class="row">
                    <div class="col-sm-12">
                        <div class="card-box">
                        	<div class="row">
                    			<div class="col-lg-12">

                                    
		                        	<?php 
		                        		$uploadsDir = '../companiesImg/';
		                        		foreach($companiesAgents as $companyAgent){
		                        				?>
                                                <?= $this->Html->link('
                                                    <div class="pas-logo-div">
                                                         <img src="'.$uploadsDir.$companyAgent['company']['base_url'].'/'.$companyAgent['company']['logo'].'" alt="'.$companyAgent['company']['company_name'].'" class="pas-logo-img" />
                                                        <div class="middle">
                                                            <i class="fa fa-search fa-2x"></i>
                                                        </div>
                                                    </div>
                                                ',['controller' => 'quotations', 'action' => 'list', $companyAgent->company->id],['escape' => false]); 
                                                ?>
		                        				<?php
		                        		}
		                        	?>
                            
                                </div><!-- end col -->
                            </div><!-- end row -->    
                        </div>
                   </div><!-- end col -->
                </div>
                <!-- end row -->


