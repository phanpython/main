<?php

namespace widgets\protection;

use core\DB;

class Protection
{
    protected $pdo;

    public function __construct() {
        $this->pdo = DB::getPDO();
    }

    public function getProtectionsTu1():array {
        $query = "SELECT * FROM get_protections_tu1";
        $stmt = $this->pdo->query($query);

        return $stmt->fetchAll();
    }

    public function getProtectionsTu1Search($search):array {
        $query = "SELECT * FROM get_protections_tu1_search(:search)";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute(array('search' => $search));

        return $stmt->fetchAll();
    }

    public function getProtectionsTu2():array {
        $query = "SELECT * FROM get_protections_tu2";
        $stmt = $this->pdo->query($query);

        return $stmt->fetchAll();
    }

    public function getProtectionsTu2Search($search):array {
        $query = "SELECT * FROM get_protections_tu2_search(:search)";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute(array('search' => $search));

        return $stmt->fetchAll();
    }

    public function getProtectionsTu3():array {
        $query = "SELECT * FROM get_protections_tu3";
        $stmt = $this->pdo->query($query);

        return $stmt->fetchAll();
    }

    public function getProtectionsTu3Search($search):array {
        $query = "SELECT * FROM get_protections_tu3_search(:search)";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute(array('search' => $search));

        return $stmt->fetchAll();
    }

    public function setMaskingProtectionsEntrance($protection, $locations, $entrance_exit, $permissionId) {
        $query = "SELECT * FROM set_masking_protections_entrance(:protection, :locations, :entrance_exit, :permission_id)";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute(array('protection' => $protection, 'locations' => $locations, 'entrance_exit' => $entrance_exit, 'permission_id' => $permissionId));
    }

    
    public function setMaskingProtectionsEntranceVtor($protection, $locations, $entrance_exit, $vtor, $permissionId) {
        $query = "SELECT * FROM set_masking_protections_entrance_vtor(:protection, :locations, :entrance_exit,:vtor , :permission_id)";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute(array('protection' => $protection, 'locations' => $locations, 'entrance_exit' => $entrance_exit,'vtor' =>  $vtor, 'permission_id' => $permissionId));
    }

    public function setMaskingProtectionsExit($protection,$entrance_exit, $permissionId) {
        $query = "SELECT * FROM set_masking_protections_exit(:protection, :entrance_exit, :permission_id)";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute(array('protection' => $protection, 'entrance_exit' => $entrance_exit, 'permission_id' => $permissionId));
    }

}