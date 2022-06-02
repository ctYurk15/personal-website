<?php

include 'bootstrap.php';

use lightstone\app\Initializer as Initializer;

$config_info = json_decode(file_get_contents(ROOT_DIR.'/config.json'), true);

Initializer::start($routes, $config_info['debug_mode'], $config_info['database']);