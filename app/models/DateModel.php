<?php

namespace models;

use core\DB;
use widgets\date\Date;

class DateModel
{
    protected $date;

    public function __construct() {
        $this->date = new Date();

        if(isset($_POST['date-1'])) {
            $this->date->delDatesByPermissionId($_SESSION['idCurrentPermission']);
            for($i = 1; $i < 1000000; $i++) {
                if(isset($_POST['date-' . $i])) {
                    $this->date->setDate($_POST['date-' . $i], $_POST['from-time-' . $i], $_POST['to-time-' . $i], $_SESSION['idCurrentPermission']);
                } else {
                    break;
                }
            }

            $location = 'Location: ' . HTTP . '://' . '/' . NAME_WEBSITE . '/permission/add';
            header($location);
            die();
        }
    }

    public function getIndexVarsToTwig():array {
        return ['dates' => $this->date->getDatesByPermissionId($_SESSION['idCurrentPermission'])];
    }
}