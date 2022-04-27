<?php

namespace controllers;

use core\Twig;
use models\MaskAddModel;

class MaskAddController extends AppController
{
    private $model;

    public function indexAction() {
        $this->checkAuthorization();

        $this->setMeta('Выбор системы');
        $this->model = new MaskAddModel();

    }

    public function addtuAction() {
        $this->checkAuthorization();
        $this->setMeta('Добавление защит');
        $this->model = new MaskAddModel();

        $this->setAddtuVarsToTwig();
    }

    public function addnpsAction() {
        $this->checkAuthorization();
        $this->setMeta('Добавление защит');
        $this->model = new MaskAddModel();

        $this->setAddnpsVarsToTwig();
    }

    public function setAddtuVarsToTwig() {
        $arr = $this->model->getAddtuVarsToTwig();
        Twig::addVarsToArrayOfRender($arr);
    }

    public function setAddnpsVarsToTwig() {
        $arr = $this->model->getAddnpsVarsToTwig();
        Twig::addVarsToArrayOfRender($arr);
    }

    public function setIndexVarsToTwig(){
        $arr = $this->model->getIndexVarsToTwig();
        Twig::addVarsToArrayOfRender($arr);
    }
}