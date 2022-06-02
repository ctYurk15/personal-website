<?php

include_once 'bootstrap.php';

use lightstone\app\Database as Database;

$action = $argv[1];

if($action == 'migrate')
{
    $database_data = json_decode(file_get_contents(ROOT_DIR.'/config.json'), true)['database'];
    Database::init_conn($database_data['host'], $database_data['user'], $database_data['password'], $database_data['dbname']);

    $migrator = new \lightstone\app\Migrator(ROOT_DIR.'/migrations/');
    $migrator->migrate();
}
