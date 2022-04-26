<?php

namespace widgets\protection;

use core\DB;

class Protection
{
    protected $pdo;

    public function __construct() {
        $this->pdo = DB::getPDO();
    }

    public function getProtectionsCSPA($userId):array {
        $query = "SELECT * FROM get_protections_cspa(:user_id)";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute(array('user_id' => $userId));

        return $stmt->fetchAll();
    }

    public function getProtectionsCSPASearch($search):array {
        $query = "SELECT * FROM get_protection_cspa_search(:search)";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute(array('search' => $search));

        return $stmt->fetchAll();
    }

}