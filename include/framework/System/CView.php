<?php

namespace Sbay\System;
use Sbay\Main as BaseMain;

class CView extends BaseMain {
    
    public $path            = '';
    public $vars            = array();
    
    public $pageName        = '';
    public $pageTitle       = '';
    public $pageDescription = '';
    public $pageAuthor      = '';
    public $pageIcon        = '';
    
    // Path Base
    public $baseCssPath     = '';
    public $baseJsPath      = '';
    public $baseImagePath   = '';

    public $getCssFile      = array();
    public $getJsFile       = array();
    
}
