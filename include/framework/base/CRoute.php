<?php

namespace Sbay\Base;
use Sbay\Main as BaseMain;

class CRoute extends BaseMain {
    
    public $controller  = 'home';
    public $action      = 'index';
    public $params      = array();
    
    public function __construct($url) {
        
        if(!empty($url)){
            $this->url = explode('/', $url);
            $this->controller   = !empty($this->url[1]) ? $this->url[1] : $this->controller;     
            $this->action       = !empty($this->url[2]) ? $this->url[2] : $this->action;   
            $this->params       = !empty($this->url[3]) ? $this->url[3] : $this->params;   
        }else{
            $this->url = '/';
        }
    }
    
}

