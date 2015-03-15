<?php

namespace Sbay\Template;
use Sbay\System\CView as BaseView;

class View extends BaseView {
    
    public function __construct( $application = array(), $controller = null, $action = null ) {
        $this->setAttributes($application);
        $this->controller   = $controller;
        $this->action       = $action;
    }
    public function setAttributes($application = array()){
//         $this->application      = $application;
        
        $this->version          = $application->config->version;
        $this->database         = $application->config->database;
        $this->pageName         = 'Home';
        $this->pageTitle        = $application->config->name;
        $this->pageDescription  = $application->config->description;
        $this->pageAuthor       = $application->config->author;
        $this->pageIcon         = $application->config->icon;
        $this->baseUrl          = $application->config->baseUrl;
        $this->baseCssPath      = $application->config->cssDir;
        $this->baseJsPath       = $application->config->jsDir;
        $this->baseImagePath    = $application->config->imageDir;
        $this->getCssFile       = $application->config->cssFiles;
        $this->getJsFile        = $application->config->jsFiles;
    }
    public function renderPhpToString( $filename = null, $vars = array() ){
        if (is_array( $vars ) && !empty( $vars )) {
            extract( $vars );
        }
        ob_start();
        include( $filename );
        $var = ob_get_contents(); 
        ob_end_clean();
        
        $this->vars = $vars;
        $this->path = $filename;
        return $var;
    }
    public function getContent($filename = null , $vars = array()){
        if(!empty( $filename )){
            $path = ROOT_PATH . '/apps/views/' . $this->controller . '/' . $filename . '.php';
            if(is_file( $path )){
                $this->content = $this->renderPhpToString( $path , $vars );
            }else{
                $this->content = $this->renderPhpToString( ROOT_PATH . '/apps/views/index.php' , $vars );
            }
        }else{
            $path = ROOT_PATH . '/apps/views/' . $this->controller . '/' . $this->action . '.php';
            if(is_file( $path )){
                $this->content = $this->renderPhpToString( $path , $vars );
            }else{
                $this->content = $this->renderPhpToString( ROOT_PATH . '/apps/views/index.php' , $vars );
            }
        }
        return $this->content;
    }
    public function __destruct() {
        $filename = ROOT_PATH . '/apps/views/main.php';
        echo $this->renderPhpToString($filename,array(
            'content' => $this->content,
        ));
    }
    
}
