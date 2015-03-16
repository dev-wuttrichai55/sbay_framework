<?php

error_reporting(E_ALL); 
define('ROOT_PATH',__DIR__);

include_once ROOT_PATH . '/include/Application.php';
$config = include_once ROOT_PATH . '/include/config/main.php';

$url = !empty($_GET['_url'])? $_GET['_url'] : null;
$application = new Application($url);
$application->run($config);