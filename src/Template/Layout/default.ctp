<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = 'Broker Digital - Backoffice Compañía';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <!-- CSS STYLES -->
    <?= $this->Html->css(['bootstrap.min', 'core', 'components', 'icons', 'pages', 'menu', 'responsive']) ?>

        <!-- DataTables -->
        <?= $this->Html->css(['/plugins/datatables/jquery.dataTables.min', 
                              '/plugins/datatables/responsive.bootstrap.min']) ?>

    <!-- SCRIPTS -->
    <?= $this->Html->script(['jquery.min', 'bootstrap.min', 'jquery.nicescroll', 'jquery.scrollTo.min', 'waves']) ?>

        <!-- Datatables-->
        <?= $this->Html->script(['/plugins/datatables/jquery.dataTables.min', 
                              '/plugins/datatables/dataTables.bootstrap', 
                              '/plugins/datatables/dataTables.responsive.min', 
                              '/plugins/datatables/responsive.bootstrap.min']) ?>

         <!-- Notifications -->
        <?= $this->Html->script(['/plugins/notifyjs/dist/notify.min','/plugins/notifications/notify-metro.js']) ?>
      
    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
       <!-- Navigation Bar-->
        <header id="topnav">
            <div class="topbar-main">
                <div class="container">
                    <!-- LOGO -->
                    <div class="topbar-left">
                        <?= $this->Html->link('<span>Broker<span>Digital</span></span>',['controller' => 'Home', 'action' => 'index'],['escape' => false, 'class' => 'logo']); ?>
                    </div>
                    <!-- End Logo container-->
                    <div class="menu-extras">
                        <ul class="nav navbar-nav navbar-right pull-right">
                            <li class="user-data">
                                <p class="m-t-5">
                                    <strong><?= $this->request->session()->read('Auth.User.first_name').' '.$this->request->session()->read('Auth.User.last_name') ?></strong>
                                    <span class="font-11">
                                        (Matrícula: <?= $this->request->session()->read('Auth.User.enrollment') ?>)
                                    </span>
                                    <a href="mailto: <?= $this->request->session()->read('Auth.User.email') ?>" class=" font-12 text-info display-block">
                                        <?= $this->request->session()->read('Auth.User.email') ?>
                                    </a>
                                </p>
                            </li>
                            <li class="dropdown user-box">
                                <a href="" class="dropdown-toggle waves-effect waves-light profile " data-toggle="dropdown" aria-expanded="true">
                                    <?= $this->Html->image('../../../companiesImg/'.$this->request->session()->read('Auth.User.photo'), ["alt" => "Avatar", "class" => ['img-circle','user-img']]); 
                                    ?>
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <?= $this->Html->link('<i class="fa fa-address-card-o  m-r-5"></i> Mi Perfil</a>',['controller' => 'Agents', 'action' => 'profile'],['escape' => false]); ?>
                                    </li>
                                    <li>
                                        <?= $this->Html->link('<i class="fa fa-lock m-r-5"></i> Cambiar Contraseña</a>',['controller' => 'Agents', 'action' => 'changePassword'],['escape' => false]); ?>
                                    </li>
                                    <li>
                                        <?= $this->Html->link('<i class="fa fa-power-off m-r-5"></i> Cerrar Sesión',['controller'=> 'Agents', 'action' => 'logout'],['escape' => false]); ?>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                        <div class="menu-item">
                            <!-- Mobile menu toggle-->
                            <a class="navbar-toggle">
                                <div class="lines">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </div>
                            </a>
                            <!-- End mobile menu toggle-->
                        </div>
                    </div>
                </div>
            </div>
            <div class="navbar-custom">
                <div class="container">
                    <div id="navigation">
                        <!-- Navigation Menu-->
                        <ul class="navigation-menu">
                            <li>
                                 <?= $this->Html->link('Compañías Asociadas',['controller'=> 'Home', 'action' => 'index'],['escape' => false]); ?>
                            </li>
                            <?php
                                if(!empty($company_name))
                                { ?>
                                    <li>  <?= $this->Html->link('» '.$company_name,['controller' => 'quotations', 'action' => 'list', $company_id],['escape' => false]); ?> </li>
                              <?php  }
                                ?>
                        </ul>
                        <!-- End navigation menu  -->
                        <div class="btn-group pull-right m-t-20 m-r-20"> 
                           <?php
                                if(!empty($company_name))
                                { ?>
                                    <label>Url de Acceso: </label>
                                    <a href="<?=$this->request->session()->read('url').$company_name.'/'.$this->request->session()->read('Auth.User.token')?>" target="_blank"><?=$this->request->session()->read('url').$company_name.'/'.$this->request->session()->read('Auth.User.token')?></a>
                                    
                              <?php  }
                                ?>
                        </div>
                        
                    </div>
                </div>
            </div>
        </header>
        <!-- End Navigation Bar-->



        <div class="wrapper">
            <div class="container">
                <?= $this->Flash->render() ?>
                <?= $this->fetch('content') ?>

                <!-- Footer -->
                <footer class="footer text-right">
                    <div class="container">
                        <div class="row">
                            <div class="col-xs-6">
                               2017 © Desarrollado por <a href="http://www.uxorit.com">Uxor It</a> .
                            </div>
                            <div class="col-xs-6 pull-right m-b-0">
                                <?= $this->Html->image('uxor.png', [
                                                    "alt" => "Uxor It",
                                                    'style' => "height: 30px; width: auto; float: right;"]); 
                                ?>
                            </div>
                        </div>
                    </div>
                </footer>
                <!-- End Footer -->

            </div><!-- end container -->
        </div><!-- end wrapper -->



    <!-- SCRIPTS -->
    <?= $this->Html->script(['jquery.app', 'jquery.core']) ?>
</body>
</html>
