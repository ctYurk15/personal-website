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
        'pattern' => '/news',
        'method' => 'GET',
        'action' => 'lightstone\app\controllers\Controller@news'
    ],
];