<?php

namespace Application\Controller;
use Sbay\System\CController as Controller;

class HomeController extends Controller {
    
    public function actionIndex(){
        $this->render('index');
    }
    
    public function actionError(){
        $this->render('error');
    }
    
}