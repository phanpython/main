<?php

namespace widgets\date;

use core\DB;

class Date
{
    protected $pdo;

    public function __construct() {
        $this->pdo = DB::getPDO();
    }

    public function getDates() {
        $query = "SELECT * FROM get_dates";
        $stmt = $this->pdo->query($query);

        return $stmt->fetchAll();
    }

    public function getDatesByUserId($userId) {
        $query = "SELECT * FROM get_dates_by_user_id(:user_id)";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute(array('user_id' => $userId));

        return $stmt->fetchAll();
    }

    public function getDatesByPermissionId($userId) {
        $query = "SELECT * FROM get_dates_by_permission_id(:user_id)";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute(array('user_id' => $userId));

        return $stmt->fetchAll();
    }

    public function setDate($date, $fromTime, $toTime, $permissionId) {
        $query = "SELECT * FROM set_date(:date, :from_time, :to_time, :permission_id)";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute(array('date' => $date, 'from_time' => $fromTime, 'to_time' => $toTime, 'permission_id' => $permissionId));
    }

    public function delDatesByPermissionId($permissionId) {
        $query = "SELECT * FROM del_dates_by_permission_id(:permission_id)";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute(array('permission_id' => $permissionId));
    }
}