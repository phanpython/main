<?php

namespace widgets\typework;

use core\DB;

class TypeWork
{
    protected $pdo;

    public function __construct() {
        $this->pdo = DB::getPDO();
    }

    public function getTypicalWorks() {
        $query = "SELECT * FROM get_standart_types_works";
        $stmt = $this->pdo->query($query);

        return $stmt->fetchAll();
    }

    public function getTypicalWorksByPermissionId($permissionId) {
        $query = "SELECT * FROM get_typical_works_by_permission_id(:permission_id)";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute(array('permission_id' => $permissionId));

        return $stmt->fetchAll();
    }

    public function delTypicalWorksByPermissionId($permissionId) {
        $query = "SELECT * FROM del_typical_works_by_permission_id(:permission_id)";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute(array('permission_id' => $permissionId));
    }

    public function delTypicalWorksById($typicalWorkId) {
        $query = "SELECT * FROM del_typical_work_by_id(:typical_work_id)";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute(array('typical_work_id' => $typicalWorkId));
    }

    public function setTypicalWorks($typesWorks = '', $permissionId = 0) {
        $arr = explode(' ', $typesWorks);

        foreach ($arr as $item) {
            $query = "SELECT * FROM set_typical_work_for_permission(:permission_id, :item)";
            $stmt = $this->pdo->prepare($query);
            $stmt->execute(array('permission_id' => $permissionId, 'item' => $item));
        }
    }

    public function getTypesWorksByUserId($userId) {
        $query = "SELECT * FROM get_types_works_by_user_id(:user_id)";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute(array('user_id' => $userId));

        return $stmt->fetchAll();
    }

    public function getTypesWorks() {
        $query = "SELECT * FROM get_types_works";
        $stmt = $this->pdo->query($query);

        return $stmt->fetchAll();
    }
}