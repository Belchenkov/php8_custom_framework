<?php

namespace app\controllers;


use wfm\Controller;


class MainController extends Controller
{

    public function indexAction()
    {

        $names = $this->model->get_names();
 
        $this->setMeta(
            'Главная страница',
            'Описание ...',
            'Ключевые слова ...',
        );

        $this->set([
            'name' => 'Main Index',
            'names' => $names
        ]);
    }
}