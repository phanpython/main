<?php

namespace controllers;

use core\Twig;
use models\DateModel;

class DateController extends AppController
{
    private $model;

    public function indexAction() {
        $this->checkAuthorization();

        $this->setMeta('Периоды работ');
        $this->model = new DateModel();

        $this->setIndexVarsToTwig();
    }

    protected function setIndexVarsToTwig() {
        $arr = $this->model->getIndexVarsToTwig();
        Twig::addVarsToArrayOfRender($arr);
    }
}