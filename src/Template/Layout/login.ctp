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

$cakeDescription = 'Broker Digital - Backoffice Productor';
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
    <?= $this->Html->css(['bootstrap.min', 'components', 'core', 'icons', 'menu', 'pages', 'responsive']) ?>
     
    <!-- SCRIPTS -->
    <?= $this->Html->script(['jquery', 'bootstrap.min']) ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>

    <?= $this->fetch('content') ?>

    <!-- Footer -->
    <footer class="footer text-right">
        <div class="container">
            <div class="row">
                <div class="col-xs-6" style="color: #fff;">
                   2017 © Desarrollado por <a href="http://www.uxorit.com" style="color: #99CCFF;">Uxor It</a> .
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
</body>
</html>
