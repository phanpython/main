<?php

namespace controllers;

use core\Twig;
use models\TypeWorkModel;

class TypeWorkController extends AppController
{
    private $model;

    public function indexAction() {
        $this->checkAuthorization();

        $this->setMeta('Типы работ');
        $this->model = new TypeWorkModel();

        $this->setIndexVarsToTwig();
    }

    protected function setIndexVarsToTwig() {
        $arr = $this->model->getArrForTwig();
        Twig::addVarsToArrayOfRender($arr);
    }
}