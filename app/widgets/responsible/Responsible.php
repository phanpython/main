<?php

namespace widgets\responsible;

use core\DB;

class Responsible
{
    protected $pdo;

    public function __construct() {
        $this->pdo = DB::getPDO();
    }

    public function searchResponsible($search):array {
        $search = '%' . $search . '%';
        $query = "SELECT * FROM search_responsible(:search)";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute(array('search' => $search));

        return $stmt->fetchAll();
    }
}