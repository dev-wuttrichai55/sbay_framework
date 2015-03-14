<?php

class CController extends CComponent {

    private $_content;

    /*
     * Manager Controller
     */
    protected function render($action = 'index'){
        $path = ROOT_PATH . '/apps/views/' .$this->controller . '/' . $action . '.php' ;
        if(is_file($path)){
            $this->_content = $this->renderPhpToString( ROOT_PATH . '/apps/views/' .$this->controller . '/' . $action . '.php' );
        }
    }
    public function renderPhpToString($filename, $vars = array()){
        if (is_array($vars) && !empty($vars)) {
            extract($vars);
        }
        ob_start();
        include( $filename );
        $var = ob_get_contents(); 
        ob_end_clean();
        return $var;
    }
    
    public function getPageError($text = null){
        if(!empty($text)){
            $this->_content = $this->renderPhpToString( ROOT_PATH . '/apps/views/error.php',array(
                'text' => $text,
            ));
        }
    }
    
    public function getContent(){
        return $this->_content;
    }
    
}
