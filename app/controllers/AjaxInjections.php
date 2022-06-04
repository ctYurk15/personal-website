<?php

namespace lightstone\app\controllers;

use lightstone\app\controllers\Controller;

class AjaxInjections extends Controller
{
    public function page()
    {
        echo $this->viewer->content('ajax-injections');
    }

    public function api()
    {
        $blacklist = ['create database', 'drop', '*', 'id'];
        $sqlcompiler =  new \SQLCompiler('localhost', 'root', 'root', 'ajax-injections', $blacklist);
        $query = $_POST["query"];
        echo json_encode($sqlcompiler->compile($query));
    }
}