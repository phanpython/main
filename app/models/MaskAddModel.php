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
                        $this->protection->setMaskingProtectionsExit($_POST['protection-' . $i], $_POST['entrance_exit-' . $i], $_SESSION['idCurrentPermission']);
                    }
                    elseif (($_POST["entrance_exit-$i"] == "entrance-$i") and (isset($_POST["vtor-$i"]))) {
                        $this->protection->setMaskingProtectionsEntranceVtor($_POST['protection-' . $i], $_POST['location-' . $i], $_POST['entrance_exit-' . $i], $_POST['vtor-' . $i], $_SESSION['idCurrentPermission']);
                    }   
                    elseif ($_POST["entrance_exit-$i"] == "entrance-$i"){
                        $this->protection->setMaskingProtectionsEntrance($_POST['protection-' . $i], $_POST['location-' . $i], $_POST['entrance_exit-' . $i], $_SESSION['idCurrentPermission']);
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
            if ($_GET['id'] == 1) {
                $k = 1;
                if(isset($_POST['search_info'])) {
                    $message = 'Совпадений не найдено';
                    $search = '%' . trim($_POST['search_info']) . '%';
                    $protection =$this->protection->getProtectionsTu1Search($search);
        
                } else {
                    $message = 'Список защит пуст';
                    $protection = $this->protection->getProtectionsTu1();
                }
                if(isset($_COOKIE['user'])) {
                    return ['protections' => $protection,
                        'message' => $message,
                        'title'=> 'ТУ1'
                    ];
                } else {
        
                }
            
            }
            elseif ($_GET['id'] == 2) {

                if(isset($_POST['search_info'])) {
                    $message = 'Совпадений не найдено';
                    $search = '%' . trim($_POST['search_info']) . '%';
                    $protection =$this->protection->getProtectionsTu2Search($search);
        
                } else {
                    $message = 'Список защит пуст';
                    $protection = $this->protection->getProtectionsTu2();
                }
                if(isset($_COOKIE['user'])) {
                    return ['protections' => $protection,
                        'message' => $message,
                        'title'=> 'ТУ2'
                    ];
                } else {
        
                }
            
            }

            elseif ($_GET['id'] == 3) {
                if(isset($_POST['search_info'])) {
                    $message = 'Совпадений не найдено';
                    $search = '%' . trim($_POST['search_info']) . '%';
                    $protection =$this->protection->getProtectionsTu3Search($search);
                } else {
                    $message = 'Список защит пуст';
                    $protection = $this->protection->getProtectionsTu3();
                }
                if(isset($_COOKIE['user'])) {
                    return ['protections' => $protection,
                        'message' => $message,
                        'title'=> 'ТУ3'
                    ];
                } 
            
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
    
            } else {
                $message = 'Список защит пуст';
                $protection = $this->protection->getProtectionsNps($npsname);
            }
            if(isset($_COOKIE['user'])) {
                return ['protections' => $protection,
                    'message' => $message,
                    'title'=> $npsname
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