<?php

namespace lightstone\app\controllers;

use lightstone\app\Leaft;
use lightstone\models\PersonalDataModel;
use lightstone\models\ProjectsModel;
use lightstone\models\NewsModel;

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
        
        $personal_data_content = $this->getPersonalDataContent();

        $this->viewer->set('PAGE_STYLESHEET', 'bio.css');
        $this->viewer->set('BIO', $personal_data_content);

        echo $this->viewer->content('pages/bio');
    }

    public function projects($page_number = null)
    {
        $projects_content = $this->getProjectsContent();

        $this->viewer->set('PAGE_STYLESHEET', 'projects.css');
        $this->viewer->set('PROJECTS', $projects_content);

        echo $this->viewer->content('pages/projects');
    }

    public function news()
    {
        $news_content = $this->getNewsContent();

        $this->viewer->set('PAGE_STYLESHEET', 'news.css');
        $this->viewer->set('NEWS', $news_content);

        echo $this->viewer->content('pages/news');
    }

    public function not_found()
    {
        echo $this->viewer->content('404');
    }

    private function getPersonalDataContent()
    {
        $content = '';
        $custom_display = [
            'work_name', 'work_website', 'work_start', 'birthday'
        ];

        //simple text data
        $personal_data = [];
        foreach(PersonalDataModel::all('`key` NOT IN ("'.implode('", "', $custom_display).'")') as $column)
        {
            $personal_data[] = $column->get('value');
        }

        //work position string
        $work_title = 'Work in ';
        $work_title .= '<a href="'. PersonalDataModel::all('`key` = "work_website"')[0]->get('value').'">';
        $work_title .= PersonalDataModel::all('`key` = "work_name"')[0]->get('value').'</a> for ';
        $work_title .= $this->getTimeTillNow(PersonalDataModel::all('`key` = "work_start"')[0]->get('value'));
        $personal_data[] = $work_title;

        //age string
        $age = 'Age: ';
        $age .= $this->getTimeTillNow(PersonalDataModel::all('`key` = "birthday"')[0]->get('value'), ['year']);
        $personal_data[] = $age;

        //forming bio
        foreach($personal_data as $personal_column)
        {
            $this->viewer->set('VALUE', $personal_column);
            $content .= $this->viewer->content('partials/bio-part');
        }

        return $content;
    }

    private function getProjectsContent()
    {
        $content = '';

        $projects = ProjectsModel::all();
        foreach($projects as $project)
        {
            $this->viewer->set('PROJECT_INFO', [
                'name' => $project->get('name'),
                'description' => $project->get('description'),
                'github' => $project->get('github'),
            ]);
            $content .= $this->viewer->content('partials/project-part');
        }

        return $content;
    }

    private function getNewsContent()
    {
        $content = '';

        $news = NewsModel::all();
        foreach($news as $news_record)
        {
            $this->viewer->set('NEWS_RECORD', [
                'title' => $news_record->get('title'),
                'date' => $news_record->get('date'),
                'content' => $news_record->get('content'),
            ]);
            $content .= $this->viewer->content('partials/news-part');
        }

        return $content;
    }

    private function getTimeTillNow($date, $columns = ['year', 'month', 'day'])
    {
        $result = '';

        $date1 = new \DateTime($date);
        $date2 = new \DateTime(date('Y-m-d'));
        $interval = $date1->diff($date2);

        if(in_array('year', $columns) && $interval->y > 0){
            $result .= $interval->y.' years ';
        }
        if(in_array('month', $columns) && $interval->m > 0){
            $result .= $interval->m.' months ';
        }
        if(in_array('day', $columns) && $interval->d > 0){
            $result .= $interval->d.' days ';
        }
        return $result; 
    }
}