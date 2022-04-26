<?php

namespace models;

use core\Twig;
use widgets\department\Department;
use widgets\subdivision\Subdivision;

class MainModel
{
    private $department;
    private $subdivision;

    public function __construct()
    {
        $this->setDepartment();
        $this->setSubdivision();

        $this->processingDepartment();
        $this->processingSubdivision();
    }

    private function getDepartment() {
        return $this->department;
    }

    private function getSubdivision() {
        return $this->subdivision;
    }

    private function setDepartment() {
        $this->department = new Department();
    }

    private function setSubdivision() {
        $this->subdivision = new Subdivision();
    }

    private function processingDepartment() {
        $department = $this->getDepartment();

        $department->setPDO();
        $department->setDepartments();
        $department->setVarsToTwig();
    }

    private function processingSubdivision() {
        $subdivision = $this->getSubdivision();

        $subdivision->setPDO();
        $subdivision->setSubdivisions();
        $subdivision->setVarsToTwig();
    }
}