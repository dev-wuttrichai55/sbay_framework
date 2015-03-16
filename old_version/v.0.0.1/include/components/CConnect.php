<?php

// Include Medoo
require_once ROOT_PATH . '/include/framework/medoo/medoo.php';

class CConnect extends medoo {
    
    private $config;
        
    public function __construct($options = array()) {
        
        $this->config = include ROOT_PATH . '/include/config/main.php';
        
        $this->database_type    = $this->config['database']['type'];
        $this->server           = $this->config['database']['server'];
	$this->username         = $this->config['database']['username'];
	$this->password         = $this->config['database']['password'];
        $this->database_name    = $this->config['database']['dbname'];
	$this->port             = $this->config['database']['port'];
        $this->charset          = $this->config['database']['charset'];
	$this->option           = array(PDO::ATTR_CASE => PDO::CASE_NATURAL);
        
        $this->init();
        
    }
    
}