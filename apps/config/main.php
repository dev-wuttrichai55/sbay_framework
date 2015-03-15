<?php

return array(
    
    'version'       => '0.0.2',
    'name'          => 'Sbay PHP Framework',
    'description'   => 'Mini PHP Framework by DriveSoftCenter.Net',
    'author'        => 'Eakkabin Jaikeawma',
    'icon'          => 'stylesheet/img/devil-icon.png',    
    
    'baseUrl'       => 'http://localhost/sbay_framework',    
    
    'database' => array(
        'type'      => 'mysql',
        'server'    => 'localhost',
        'username'  => 'root',
        'password'  => '',
        'dbname'    => 'db_demo',
        'port'      => 3306,
        'charset'   => 'utf8',
    ),
    
    // path
    'cssDir'        => 'public/assets/css',
    'jsDir'         => 'public/assets/js',
    'imageDir'      => 'public/images',
    
    // import file
    'cssFiles'      => array(
        'bootstrap.min.css',
        'jquery-ui-1.10.0.custom.css',
        'style.css',
    ),
    'jsFiles'      => array(
        'script.js'
    ),
    
);