<?php

class CSetting {
    
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
    
}