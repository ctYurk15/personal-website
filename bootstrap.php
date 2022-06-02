<?php

include_once 'routes.php';
if(file_exists('vendor/autoload.php'))
{
    include_once 'vendor/autoload.php';
}

spl_autoload_register(function ($class_path) {

    //removing framework name
    $class_path = str_replace('lightstone\\', '', $class_path);
    $class_path = str_replace('\\', '/', $class_path);

    include_once $class_path.'.php';
});

const ROOT_DIR = __DIR__;