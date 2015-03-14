<?php

session_start();
error_reporting(E_ALL); 

header('Content-Type: text/html; charset=utf-8');
define('ROOT_PATH',__DIR__);

include_once ROOT_PATH . '/include/framework/Autoload.php';
include_once ROOT_PATH . '/include/framework/Sbay.php';
$config = include ROOT_PATH . '/apps/config/main.php';

$url = !empty($_GET['_url'])? $_GET['_url'] : null;
$application = new Sbay\Application($config);
$application->createWebApplication($url);