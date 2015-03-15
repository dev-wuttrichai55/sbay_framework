<?php

namespace Sbay\System;
use Sbay\Template\View as View;
use Sbay\Main as BaseMain;

class CController extends BaseMain {
    
    public function render($filename = null, $vars = array()){
        $view               = new View($this->application,$this->controller,$this->action);
        $this->content      = $view->getContent($filename,$vars);
        $this->filename     = $filename;
    }
    public function view($controller = null,$action = null, $application = array()){
        $this->controller   = $controller;
        $this->action       = $action;
        $this->application  = $application;
    }
    public function getPageError($text = null){
        $view  = new View($this->application,'home','error');
        if(!empty($text)){
            $this->content = $view->getContent('error',array(
                'text' => !empty($text) ? $text : "error",
            ));
        }
    }
}
