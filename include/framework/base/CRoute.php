<?php

namespace Sbay\Base;

class CRoute {
    
    public $url;
    
    public $defaultController   = 'home';
    public $defaultAction       = 'index';
    
    public function __construct($url) {
        if(!empty($url)){
            if(!empty($this->url)){
                $this->route = array(
                    'controller'    => !empty($this->url[1]) ? $this->url[1] : $this->defaultController,
                    'action'        => !empty($this->url[2]) ? $this->url[2] : $this->defaultAction,
                    'params'        => !empty($this->url[3]) ? $this->url[3] : array(),
                );
            }
        }else{
            $this->url = '/';
            $this->route = array(
                'controller'    => $this->defaultController,
                'action'        => $this->defaultAction,
                'params'        => array(),
            );
        }
    }
    
}

