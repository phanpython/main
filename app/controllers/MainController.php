<?php

namespace controllers;

use core\base\Model;
use widgets\authorization\Authorization;
use widgets\department\Department;
use widgets\registration\Registration;
use widgets\subdivision\Subdivision;
use models\MainModel;

class MainController extends AppController
{
    public function indexAction() {
        if(isset($_COOKIE['user'])) {
            header('Location: http://trans/permission');
            die();
        }

        $this->setMeta('Главная');

        new MainModel();
        new Authorization();
        new Registration();
    }
}