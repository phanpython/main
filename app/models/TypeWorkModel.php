<?php

namespace models;

use widgets\typework\TypeWork;

class TypeWorkModel
{
    protected $typeWork;

    public function __construct() {
        $this->typeWork = new TypeWork();

        if(isset($_POST['types_works'])) {
            $this->typeWork->delTypicalWorksByPermissionId($_SESSION['idCurrentPermission']);
            if($_POST['types_works'] !== '') {
                $this->typeWork->setTypicalWorks($_POST['types_works'], $_SESSION['idCurrentPermission']);
            }
            $location = 'Location: ' . HTTP . '://' . '/' . NAME_WEBSITE . '/permission/add';
            header($location);
            die();
        }
        if(isset($_POST['add-protections'])) {
            
            $location = 'Location: ' . HTTP . '://' . '/' . NAME_WEBSITE . '/permission/add';
            header($location);
            die();
        }
    }

    public function getArrForTwig():array {
        return ['works' => $this->typeWork->getTypicalWorks(),
            'current_types_works' => $this->typeWork->getTypicalWorksByPermissionId($_SESSION['idCurrentPermission'])];
    }
}