<?php

namespace controllers;

use core\Twig;
use models\PermissionModel;

class PermissionController extends AppController
{
    private $model;

    public function indexAction() {
        $this->checkAuthorization();

        $this->setMeta('Разрешения');
        $this->model = new PermissionModel();

        $this->setIndexVarsToTwig();
    }

    public function addAction() {
        $this->checkAuthorization();
        $this->setMeta('Добавить разрешение');
        $this->model = new PermissionModel();

        $this->setAddVarsToTwig();
    }

    public function setAddVarsToTwig() {
        $arr = $this->model->getAddVarsToTwig();
        Twig::addVarsToArrayOfRender($arr);
//        Twig::addVarsToArrayOfRender(['current_typical_works' => $this->model->getCurrentTypicalWorks()]);
    }

    public function setIndexVarsToTwig(){
        $arr = $this->model->getIndexVarsToTwig();
        Twig::addVarsToArrayOfRender($arr);
    }
}