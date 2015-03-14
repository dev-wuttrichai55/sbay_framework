<?php

class CComponent {
    
    protected $defaultController    = 'index';
    protected $defaultAction        = 'index';

    protected $controller;
    protected $action;
    protected $params;
     
    protected $url              = array();
    protected $route            = array();
    
    protected $version;
    
    protected $pageName;
    protected $pageTitle;
    protected $pageDescription;
    protected $pageAuthor;
    protected $pageIcon;
    
    protected $content;
    protected $baseUrl;
   
    // Path Base
    protected $baseCssPath;
    protected $baseJsPath;
    protected $baseImagePath;

    protected $getCssFile       = array();
    protected $getJsFile       = array();
    
    private $config;

    public function __construct($uri = null) {
        $this->setRoute($uri);
        $this->getRoute();
    }
    
    private function setConfig($config){
        
        $this->config = (object) $config;
        
        $this->version          = $this->config->version;
        $this->pageName         = 'Home';
        $this->pageTitle        = $this->config->name;
        $this->pageDescription  = $this->config->description;
        $this->pageAuthor       = $this->config->author;
        $this->pageIcon         = $this->config->icon;

        $this->content          = '';
        $this->baseUrl          = $this->config->baseUrl;

        // Path Base
        $this->baseCssPath      = $this->config->cssDir;
        $this->baseJsPath       = $this->config->jsDir;
        $this->baseImagePath    = $this->config->imageDir;
        
        $this->getCssFile       = $this->config->cssFiles;
        $this->getJsFile        = $this->config->jsFiles;
        
    }
    
    protected function createWebApplication($config) {
        $this->setConfig($config);
        $this->registerController();
        $this->getLayoutHeader(); // ส่วนบน
        $this->getLayoutContent(); // เนื้อหา
        $this->getLayoutFooter(); // ส่วนล่าง
    }
    
    private function registerController(){
        if(is_file($path = ROOT_PATH . '/apps/controllers/' . ucfirst($this->controller). 'Controller.php')) { // IndexController.php
            include_once $path;                                             // IndexController.php
            $classController = ucfirst($this->controller) . 'Controller';   // IndexController
            $methodAction = 'action' . ucfirst($this->action);              // actionIndex
            $objectController = new $classController($this->controller);    // new IndexController();
            if(is_a($objectController,$classController)){
                if(method_exists($objectController, $methodAction)){
                    $objectController->$methodAction();                     // actionIndex
                } else {
                    $objectController->getPageError('ไม่พบ Action ที่ต้องการ');
                }
            } else {
                $objectController = new CController('error');
                $objectController->getPageError('ไม่พบ Controller ที่ต้องการ');
            }
        } else {
            $objectController = new CController('error');
            $objectController->getPageError('ไม่พบ Controller ที่ต้องการ');
        }
        $this->content = $objectController->getContent();
    }

    private function setRoute($url = null){
        if(!empty($url)){
            $this->url = explode('/', $url);
            if(!empty($this->url)){
                $this->route = array(
                    'controller'    => !empty($this->url[1]) ? $this->url[1] : $this->defaultController,
                    'action'        => !empty($this->url[2]) ? $this->url[2] : $this->defaultAction,
                    'params'        => !empty($this->url[3]) ? $this->url[3] : array(),
                );
            }
        }else{
            $this->route = array(
                'controller'    => $this->defaultController,
                'action'        => $this->defaultAction,
                'params'        => array(),
            );
        }
    }
    private function getRoute(){
        $this->controller   = $this->route['controller'];
        $this->action       = $this->route['action'];
        $this->params       = $this->route['params'];
    }
    
    private function getLayoutContent(){
        $path = '/themes/layouts/content.php';
        if($this->checkPath($path)){
            include_once $path;
        }
    }
    private function getLayoutHeader(){
        $path = '/themes/layouts/header.php';
        if($this->checkPath($path)){
            include_once $path;
        }
    }
    private function getLayoutFooter(){
        $path = '/themes/layouts/footer.php';
        if($this->checkPath($path)){
            include_once $path;
        }
    }
    
    private function checkPath($path){
        if(is_file(ROOT_PATH . $path)){
            return true;
        }else{
            $paths = explode('/', $path);
            unset($paths[0]);
            $objectController = new CController('error');
            $objectController->getPageError('ไม่พบไฟล์ | ' . implode('/',$paths));
            echo '<body>';
                echo $objectController->getContent();
            echo '</body>';
            return false;
        }
    }
    
    // get url
    public function createUrl($url = ''){
        print_r($this);
        return $this->baseUrl . '/' . $url;
    }
    protected function getCssUrl(){
        return $this->baseUrl . '/' . $this->baseCssPath;
    }
    protected function getJsUrl(){
        return $this->baseUrl . '/' . $this->baseJsPath;
    }
    protected function getImageUrl(){
        return $this->baseUrl . '/' . $this->baseImagePath;
    }
    
    // get path
    protected function getCssPath(){
        return ROOT_PATH . '/' . $this->baseCssPath;
    }
    protected function getJsPath(){
        return ROOT_PATH . '/' . $this->baseJsPath;
    }
    protected function getImagePath(){
        return ROOT_PATH . '/' . $this->baseImagePath;
    }
    
}
