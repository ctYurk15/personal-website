<?php

namespace lightstone\app\controllers;

use lightstone\app\Leaft;

class Controller
{
    protected $viewer;

    public function __construct()
    {
        $this->viewer = new Leaft();
    }

    public function home()
    {
        $this->viewer->set('TITLE', 'Hello developer!');
        echo $this->viewer->content('main');
    }

    public function not_found()
    {
        echo $this->viewer->content('404');
    }
}