<?php

//creating routemap. here can be instances for Route class too
$routes = [
    [
        'pattern' => '/',
        'method' => 'GET',
        'action' => 'lightstone\app\controllers\Controller@home'
    ],
    [
        'pattern' => '/bio',
        'method' => 'GET',
        'action' => 'lightstone\app\controllers\Controller@bio'
    ],
    [
        'pattern' => '/projects',
        'method' => 'GET',
        'action' => 'lightstone\app\controllers\Controller@projects'
    ],
    [
        'pattern' => '/projects/{page}',
        'method' => 'GET',
        'action' => 'lightstone\app\controllers\Controller@projects'
    ],
    [
        'pattern' => '/news',
        'method' => 'GET',
        'action' => 'lightstone\app\controllers\Controller@news'
    ],
    [
        'pattern' => '/ajaxinjections',
        'method' => 'GET',
        'action' => 'lightstone\app\controllers\AjaxInjections@page'
    ],
    
    [
        'pattern' => '/ajaxinjections-api',
        'method' => 'POST',
        'action' => 'lightstone\app\controllers\AjaxInjections@api'
    ],
];