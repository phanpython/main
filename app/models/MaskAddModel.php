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
            echo print_r($_POST);
            for($i = 1; $i < 100; $i++) {
                if(isset($_POST["add-system-$i"])){
                    if(($_POST["entrance_exit-$i"] == "exit-$i")){
                        $this->protection->setMaskingProtectionsExit($_POST['protection_id-' . $i], $_POST['entrance_exit-' . $i], $_SESSION['idCurrentPermission']);
                    }
                    elseif (($_POST["entrance_exit-$i"] == "entrance-$i") and (isset($_POST["vtor-$i"]))) {
                        $this->protection->setMaskingProtectionsEntranceVtor($_POST['protection_id-' . $i], $_POST['location-' . $i], $_POST['entrance_exit-' . $i], $_POST['vtor-' . $i], $_SESSION['idCurrentPermission']);
                    }   
                    elseif ($_POST["entrance_exit-$i"] == "entrance-$i"){
                        $this->protection->setMaskingProtectionsEntrance($_POST['protection_id-' . $i], $_POST['location-' . $i], $_POST['entrance_exit-' . $i], $_SESSION['idCurrentPermission']);
                    }    
                }
                
            }
            $location = 'Location: ' . HTTP . '://' . '/' . NAME_WEBSITE . '/permission/add';
            header($location);
            die();
        }
    }

    public function getAddtuVarsToTwig():array {

        if(isset($_GET['id'])){
            $tuname = $_GET['id'];
            if(isset($_POST['search_info'])) {
                $message = 'Совпадений не найдено';
                $search = '%' . trim($_POST['search_info']) . '%';
                $protection =$this->protection->getProtectionsTuSearch($tuname, $search);
    
            } else {
                $message = 'Список защит пуст';
                $protection = $this->protection->getProtectionsTu($tuname);
            }
            if(isset($_COOKIE['user'])) {
                return ['protections' => $protection,
                    'message' => $message,
                    'title'=> $tuname
                ];
            } 
                
        }
    }

    public function getAddnpsVarsToTwig():array {

        if(isset($_GET['id'])){
            $npsname = $_GET['id'];
            if(isset($_POST['search_info'])) {
                $message = 'Совпадений не найдено';
                $search = '%' . trim($_POST['search_info']) . '%';
                $protection =$this->protection->getProtectionsNpsSearch($npsname, $search);
                $types = $this->protection->getTypesWithoutParent();
            } else {
                $message = 'Список защит пуст';
                $protection = $this->protection->getProtectionsNps($npsname);
                $types = $this->protection->getTypesWithoutParent();
            }


            if(isset($_COOKIE['user'])) {
                return ['protections' => $protection,
                    'message' => $message,
                    'title'=> $npsname,
                    'types' => $types
                ];
            } 
                
        }

    }

    public function getAddluVarsToTwig():array {

        if(isset($_GET['id'])){
            $luname = $_GET['id'];
            if(isset($_POST['search_info'])) {
                $message = 'Совпадений не найдено';
                $search = '%' . trim($_POST['search_info']) . '%';
                $protection =$this->protection->getProtectionsLuSearch($luname, $search);
    
            } else {
                $message = 'Список защит пуст';
                $protection = $this->protection->getProtectionsLu($luname);
            }
            if(isset($_COOKIE['user'])) {
                return ['protections' => $protection,
                    'message' => $message,
                    'title'=> $luname
                ];
            } 
                
        }
    }
    



}