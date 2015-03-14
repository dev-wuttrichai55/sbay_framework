<?php

ob_start();
session_start();

require_once 'components/CComponent.php';
include_once 'components/CController.php';
include_once 'components/CConnect.php';

class Application extends CComponent {
    
    public function run($config){
        $this->createWebApplication($config);
    }
    
}

