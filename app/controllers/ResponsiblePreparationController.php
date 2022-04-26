<?php

namespace controllers;

use core\Twig;
use models\ResponsiblesPreparationModel;

class ResponsiblePreparationController extends AppController
{
    private $model;

    public function indexAction() {
        $this->checkAuthorization();

        $this->setMeta('Ответственные');
        $this->model = new ResponsiblesPreparationModel();

        $this->setIndexVarsToTwig();
    }

    public function setIndexVarsToTwig() {
        $arr = $this->model->getIndexVarsToTwig();
        Twig::addVarsToArrayOfRender($arr);
    }
}