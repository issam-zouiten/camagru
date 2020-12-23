<?php
    //load config

    require_once 'config/config.php';
    require_once 'helpers/url_helper.php';
    //autoload core libraries
    spl_autoload_register(function($classname){
        require_once 'libraries/' . $classname . '.php';
    });
    // 
