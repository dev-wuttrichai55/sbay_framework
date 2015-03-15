<?php

namespace Sbay\Loader;

class Autoload {
    
    private $loader;

    public function __construct($loader) {
        $this->loader = $loader;
        $loadFramework = array(
            __DIR__ . '/System',
            __DIR__ . '/Template',
        );
        foreach ($loadFramework as $dir) {
            if (is_dir($dir)) {
                if (opendir($dir)) {
                    $files = scandir($dir); 
                    foreach ($files as $file) {
                        if($file != '.' && $file != '..'){
                            $path = $dir . '/' . $file;
                            if(is_file($path)){
                                include $path;
                            }
                        }
                   }
                }
            }
        }
    }
    
    public function __destruct() {
        foreach ($this->loader as $dir) {
            if (is_dir($dir)) {
                if (opendir($dir)) {
                    $files = scandir($dir); 
                    foreach ($files as $file) {
                        if($file != '.' && $file != '..'){
                            $path = $dir . '/' . $file;
                            if(is_file($path)){
                                include $path;
                            }
                        }
                   }
                }
            }
        }
    }
    
    public function getLoader(){
        return $this->loader;
    }
    
}
