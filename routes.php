<?php

//creating routemap. here can be instances for Route class too
$routes = [
    [
        'pattern' => '/',
        'method' => 'GET',
        'action' => 'lightstone\app\controllers\Controller@home'
    ]
];