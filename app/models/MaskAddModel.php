<?php

namespace models;

use widgets\protection\Protection;

class MaskAddModel
{
    protected $maskAdd;
    protected $protection;
    protected $date;

    public function __construct() {
        $this->protection = new Protection();
        if(isset($_POST['add-masks'])) {
            $this->protection->addProtection($_POST['protection'], $_SESSION['idCurrentPermission']);

            if($this->permission->isUntypicalWorkInPermission($_SESSION['idCurrentPermission'])) {
                $this->permission->updateUntypicalWorkToPermission($_POST['untypical_works'], $_SESSION['idCurrentPermission']);
            } else {
                $this->permission->addUntypicalWorkToPermission($_POST['untypical_works'], $_SESSION['idCurrentPermission']);
            }
            $this->permission->addAdditionToPermission($_POST['addition'], $_SESSION['idCurrentPermission']);
        } else {    
        }

    }

    
    public function getAddtuVarsToTwig():array {
        if(isset($_POST['search_info'])) {
            $message = 'Совпадений не найдено';
            $search = '%' . trim($_POST['search_info']) . '%';
            $protection =$this->protection->getProtectionsCSPASearch($search);

        } else {
            $message = 'Список разрешений пуст';
            $protection = $this->protection->getProtectionsCSPA($_COOKIE['user']);
        }
        if(isset($_COOKIE['user'])) {
            return ['protections' => $protection,
                'message' => $message
            ];
        } else {

        }

    }

}