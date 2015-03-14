<?php

namespace Sbay\Controller;
use Sbay\Base\CController as Controller;

class HomeController extends Controller {
    
    public function actionIndex(){
        $this->render('index');
    }
    
    public function actionError(){
        $this->render('error');
    }
    
}