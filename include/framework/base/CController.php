<?php

namespace Sbay\Base;
use Sbay\Template\View as View;
use Sbay\Main as BaseMain;

class CController extends BaseMain {
    
    public function render($filename = null, $vars = array()){
        $view  = new View($this->application,$this->controller,$this->action);
        $this->content = $view->getContent($filename,$vars);
        $this->filename = $filename;
    }
    public function view($controller,$action,$application = array()){
        $this->controller   = $controller;
        $this->action       = $action;
        $this->application  = $application;
    }
    
}
