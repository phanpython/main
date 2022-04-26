<?php

namespace widgets\subdivision;

use core\DB;
use core\Twig;

class Subdivision
{
    private $pdo;
    private $subdivisions = [];

    public function __construct() {
    }

    public function setSubdivisions() {
        $pdo = $this->getPDO();
        $query = "SELECT * FROM get_subdivisions";
        $stmt = $pdo->query($query);

        $this->subdivisions = $stmt->fetchAll();
    }

    public function getSubdivisions():array {
        return $this->subdivisions;
    }

    public function setVarsToTwig() {
        Twig::addVarsToArrayOfRender(['subdivisions' => $this->getSubdivisions()]);
    }

    public function setPDO() {
        $this->pdo = DB::getPDO();
    }

    public function getPDO() {
        return $this->pdo;
    }
}