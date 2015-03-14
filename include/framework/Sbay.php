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
        $this->route        = (object) $objRoute->route;
        $this->controller   = $this->route->controller;
        $this->action       = $this->route->action;
        $this->params       = $this->route->params;
    }
    public function registerController(){
        $classController = 'Sbay\Controller\\' . ucfirst($this->controller) . 'Controller';     // HomeController
        $methodAction = 'action' . ucfirst($this->action);                                      // actionIndex
        $objectController = new $classController();                                             // new HomeController();
        if(is_a($objectController,$classController)){
            if(method_exists($objectController, $methodAction)){
                $objectController->view($this->controller,$this->action,$this);
                $objectController->$methodAction();                                             // actionIndex
            } else {
                $objectController->getPageError('ไม่พบ Action ที่ต้องการ');
            }
        }
    }
    
}

