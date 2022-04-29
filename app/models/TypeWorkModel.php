<?php

namespace models;

use widgets\typework\TypeWork;
use widgets\protection\Protection;

class TypeWorkModel
{
    protected $typeWork;

    public function __construct() {
        $this->typeWork = new TypeWork();
        $this->protection = new Protection();

        if(isset($_POST['types_works'])) {
            $this->typeWork->delTypicalWorksByPermissionId($_SESSION['idCurrentPermission']);
            if($_POST['types_works'] !== '') {
                $this->typeWork->setTypicalWorks($_POST['types_works'], $_SESSION['idCurrentPermission']);
            }
            //$location = 'Location: ' . HTTP . '://' . '/' . NAME_WEBSITE . '/permission/add';
            //header($location);
            //die();
        }

        if(isset($_POST['add-protections'])) {
            for($i = 1; $i < 100; $i++) {
                if(isset($_POST["typical_work-$i"])){
                    $protections =  $this->protection->getMaskingProtectionsFromTypicalWorks($_POST["work_name-$i"], $_SESSION['idCurrentPermission']);
                   // $this->protection->setMaskingProtectionsFromTypicalWorks($_POST["work_name-$i"], $_SESSION['idCurrentPermission']);
                }
            }
            $j = 0;
            while( $j < count($protections)){
                $this->protection->setMaskingProtectionsFromTypicalWorks(($protections[$j]['protection_id']), $_SESSION['idCurrentPermission']);
                $j++;
            }
            
            $location = 'Location: ' . HTTP . '://' . '/' . NAME_WEBSITE . '/permission/add';
            header($location);
            die();
        }

    }

    public function getArrForTwig():array {
        
        if(isset($_COOKIE['user'])) {
            return ['works' => $this->typeWork->getTypicalWorks(),
                'current_types_works' => $this->typeWork->getTypicalWorksByPermissionId($_SESSION['idCurrentPermission'])];
        }
    }
}