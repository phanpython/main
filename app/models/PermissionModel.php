<?php

namespace models;

use widgets\date\Date;
use widgets\permission\Permission;
use widgets\typework\TypeWork;

class PermissionModel
{
    protected $typeWork;
    protected $permission;
    protected $date;

    public function __construct() {
        $this->typeWork = new TypeWork();
        $this->permission = new Permission();
        $this->date = new Date();

        if(isset($_POST['save_permission']) || isset($_POST['create-permission'])) {
            if(isset($_POST['save_permission'])) {
                $this->permission->addDescriptionToPermission($_POST['description'], $_SESSION['idCurrentPermission']);

                if($this->permission->isUntypicalWorkInPermission($_SESSION['idCurrentPermission'])) {
                    $this->permission->updateUntypicalWorkToPermission($_POST['untypical_works'], $_SESSION['idCurrentPermission']);
                } else {
                    $this->permission->addUntypicalWorkToPermission($_POST['untypical_works'], $_SESSION['idCurrentPermission']);
                }
                $this->permission->addAdditionToPermission($_POST['addition'], $_SESSION['idCurrentPermission']);
            } else {
                $this->permission->setPermission($_COOKIE['user']);
                $this->permission->connectUserAndPermission($_COOKIE['user'], $_SESSION['idCurrentPermission']);
            }

            $location = 'Location: ' . HTTP . '://' . '/' . NAME_WEBSITE . '/permission/add';
            header($location);
            die();
        }
    }

    public function getIndexVarsToTwig() {
        if(isset($_POST['search_info'])) {
            $message = 'Совпадений не найдено';
            $search = '%' . trim($_POST['search_info']) . '%';
            $permission =$this->permission->getPermissionsByUserIdSearch($_COOKIE['user'], $search);
        } else {
            $message = 'Список разрешений пуст';
            $permission = $this->permission->getPermissionsByUserId($_COOKIE['user']);
        }

        if(isset($_COOKIE['user'])) {
            return ['permissions' => $permission,
                'author' => $this->permission->getAuthorOfPermissionByUserId($_COOKIE['user']),
                'dates' => $this->date->getDatesByUserId($_COOKIE['user']),
                'responsiblesForExecute' => $this->permission->getResponsiblesForExecuteOfPermissionByUserId($_COOKIE['user']),
                'responsiblesForPreparation' => $this->permission->getResponsiblesForPreparationOfPermissionByUserId($_COOKIE['user']),
                'typesWorks' => $this->typeWork->getTypesWorksByUserId($_COOKIE['user']),
                'message' => $message
            ];
        } else {
            return ['permissions' => $this->permission->getPermissions(),
                'authors' => $this->permission->getAuthorOfPermission(),
                'responsiblesForExecute' => $this->permission->getResponsiblesForExecuteOfPermission(),
                'responsiblesForPreparation' => $this->permission->getResponsiblesForPreparationOfPermission(),
                'dates' => $this->date->getDates(),
                'typesWorks' => $this->typeWork->getTypesWorks(),
                'message' => $message
            ];
        }
    }

    public function getAddVarsToTwig():array {
        if (isset($_REQUEST["id"])) {
            $this->typeWork->delTypicalWorksById($_REQUEST["id"]);
            return ['ajax' => true];
        } else {
            return ['current_typical_works' => $this->typeWork->getTypicalWorksByPermissionId($_SESSION['idCurrentPermission']),
                'current_dates' => $this->date->getDatesByPermissionId($_SESSION['idCurrentPermission']),
                'description' => $this->permission->getDescriptionOfPermission($_SESSION['idCurrentPermission']),
                'addition' => $this->permission->getAdditionOfPermission($_SESSION['idCurrentPermission']),
                'protections' => $this->permission->getProtectionsOfPermission($_SESSION['idCurrentPermission']),
                'untypical_work' => $this->permission->getUntypicalWorkOfPermission($_SESSION['idCurrentPermission'])];
        }
    }
}