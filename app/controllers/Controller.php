<?php

namespace lightstone\app\controllers;

use lightstone\app\Leaft;

class Controller
{
    protected $viewer;

    public function __construct()
    {
        $this->viewer = new Leaft();

        //for correct website navigation
        $root_url = '';
        if($_SERVER['SCRIPT_NAME'] != '/index.php')
        {
            $root_url = array_values(array_filter(explode('/', $_SERVER['SCRIPT_NAME'])))[0];
        }

        $this->viewer->set('ROOT_URL', '/'.$root_url);
    }

    public function home()
    {
        $this->viewer->set('TITLE', 'Yurii Hrytsak');
        echo $this->viewer->content('main');
    }

    public function bio()
    {
        $this->viewer->set('PAGE_STYLESHEET', 'bio.css');
        echo $this->viewer->content('pages/bio');
    }

    public function projects()
    {
        $this->viewer->set('PAGE_STYLESHEET', 'projects.css');
        echo $this->viewer->content('pages/projects');
    }

    public function news()
    {
        $this->viewer->set('PAGE_STYLESHEET', 'news.css');
        echo $this->viewer->content('pages/news');
    }

    public function not_found()
    {
        echo $this->viewer->content('404');
    }
}