<?php

namespace lightstone\app;

use lightstone\app\router\Router as Router;
use lightstone\app\router\URL as URL;
use lightstone\app\Leaft as Leaft;
use lightstone\models\Model as Model;
use lightstone\app\Database as Database;

class Initializer
{
    public static function start($routes = [], $debug_mode = false, $database_data = [])
    {
        static::initFramework($debug_mode);
        static::initTemplateEngine();
        static::initDatabaseConnection($database_data);
        static::initRouter($routes);
    }

    protected static function initFramework($debug_mode = false)
    {
        if($debug_mode)
        {
            error_reporting(-1);
            ini_set('display_errors', 'On');
        }
    }

    protected static function initTemplateEngine()
    {
        Leaft::setTemplatePath(ROOT_DIR.'/templates/');
    }

    protected static function initDatabaseConnection($database_data = [])
    {
        Model::init_conn($database_data['host'], $database_data['user'], $database_data['password'], $database_data['dbname']);
    }

    protected static function initRouter($routes = [])
    {
        $current_url = new URL($_SERVER['REQUEST_URI']);
        $router = new Router($routes, ['', '', 'lightstone\app\controllers\Controller@not_found']);
        $route = $router->getRoute($current_url, $_SERVER['REQUEST_METHOD']);
        $route->execute();
    }
}