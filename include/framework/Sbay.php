<?php

namespace Sbay;

use Sbay\Loader\Autoload as Autoload;
use Sbay\Base\CConfig as Config;
use Sbay\Main as BaseMain;
use Sbay\Base\CRoute as Route;

include_once ROOT_PATH . '/include/framework/Main.php';

class Application extends BaseMain {
    
    public function __construct($config) {
        $loader = include_once ROOT_PATH . '/apps/config/autoload.php';
        new Autoload($loader);
        $objConfig = new Config($config);
        $this->config = $objConfig->config;
    }
    public function createWebApplication($url){
        $this->setRoute($url);
        $this->registerController();
    }
    public function setRoute($url){
        $objRoute           = new Route($url);
        $this->controller   = $objRoute->controller;
        $this->action       = $objRoute->action;
        $this->params       = $objRoute->params;
    }
    public function registerController(){
        $controllerName = ucfirst($this->controller) . 'Controller';
        $actionName     = 'action' . ucfirst($this->action);
        $path = ROOT_PATH . '/apps/controllers/' . $controllerName . '.php';   // HomeController.php
        if(is_file($path)){
            $classController = 'Sbay\Controller\\' . $controllerName;         // HomeController
            $methodAction = $actionName;                                          // actionIndex
            $objectController = new $classController();                                                 // new HomeController();
            if(is_a($objectController,$classController)){
                if(method_exists($objectController, $actionName)){
                    $objectController->view($this->controller,$this->action,$this);
                    $objectController->$methodAction();                                             // actionIndex
                } else {
                    $this->getPageError('Method Action | Not Found',$objectController);
                }
            } else {
                $this->getPageError('Controller | Not Found',$objectController);
            }
        } else {
            $this->getPageError('Controller | Not Found');
        }
    }
    
    private function getPageError($text = '',$objController = null){
        if(is_object($objController)){
            $objController->view($this->controller,$this->action,$this);
            $objController->getPageError($text);
        }else{
            $objectController = new \Sbay\Controller\HomeController(); 
            $objectController->view($this->controller,$this->action,$this);
            $objectController->getPageError($text);
        }
    }
    
}

