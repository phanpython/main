<?php

namespace widgets\permission;

use core\DB;

class Permission
{
    protected $pdo;

    public function __construct() {
        $this->pdo = DB::getPDO();
    }

    public function getPermissions():array {
        $query = "SELECT * FROM get_permissions";
        $stmt = $this->pdo->query($query);

        return $stmt->fetchAll();
    }

    public function getPermissionsByUserId($userId):array {
        $query = "SELECT * FROM get_permissions_by_user_id(:user_id)";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute(array('user_id' => $userId));

        return $stmt->fetchAll();
    }

    public function getPermissionsByUserIdSearch($userId, $search):array {
        $query = "SELECT * FROM get_permissions_by_user_id_search(:user_id, :search)";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute(array('user_id' => $userId, 'search' => $search));

        return $stmt->fetchAll();
    }

    public function getAuthorOfPermission():array {
        $query = "SELECT * FROM get_authors_of_permissions";
        $stmt = $this->pdo->query($query);

        return $stmt->fetchAll();
    }

    public function getAuthorOfPermissionByUserId($userId):array {
        $query = "SELECT * FROM get_user_by_id(:user_id)";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute(array('user_id' => $userId));

        $result = $stmt->fetch();

        if($result) {
            return $result;
        } else {
            return [];
        }
    }

    public function getResponsiblesForExecuteOfPermission():array {
        $query = "SELECT * FROM get_responsibles_for_execute_of_permissions";
        $stmt = $this->pdo->query($query);

        return $stmt->fetchAll();
    }

    public function getResponsiblesForExecuteOfPermissionByUserId($userId):array {
        $query = "SELECT * FROM get_responsibles_for_execute_of_permissions_by_user_id(:user_id)";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute(array('user_id' => $userId));

        return $stmt->fetchAll();
    }

    public function getResponsiblesForPreparationOfPermissionByUserId($userId) {
        $query = "SELECT * FROM get_responsibles_for_preparation_of_permissions_by_user_id(:user_id)";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute(array('user_id' => $userId));

        return $stmt->fetchAll();
    }

    public function getResponsiblesForPreparationOfPermission():array {
        $query = "SELECT * FROM get_responsibles_for_preparation_of_permissions";
        $stmt = $this->pdo->query($query);

        return $stmt->fetchAll();
    }

    public function setPermission($userId) {
        $date =  date('d.m.Y');
        $query = "SELECT * FROM set_permission(:user_id, :date)";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute(array('user_id' => $userId, 'date' => $date));
        $_SESSION['idCurrentPermission'] =  $stmt->fetch()['id'];
    }

    public function connectUserAndPermission($userId, $permissionId) {
        $query = "SELECT * FROM connect_user_and_permission(:user_id, :permission_id)";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute(array('user_id' => $userId, 'permission_id' => $permissionId));
    }

    public function addDescriptionToPermission($description, $permissionId) {
        $query = "SELECT * FROM add_description_to_permission(:description, :permission_id)";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute(array('description' => trim($description), 'permission_id' => $permissionId));
    }

    public function addUntypicalWorkToPermission($typeWork, $permissionId) {
        $query = "SELECT * FROM add_type_work_to_permission(:type_work)";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute(array('type_work' => trim($typeWork)));
        $typeWorkId = $stmt->fetch()[0];

        $query = "SELECT * FROM connect_type_work_and_permission(:permission_id, :type_work_id)";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute(array('permission_id' => $permissionId, 'type_work_id' => $typeWorkId));

        $query = "SELECT * FROM set_nonstandart_type_work(:type_work_id)";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute(array('type_work_id' => $typeWorkId));
    }

    public function updateUntypicalWorkToPermission($typeWork, $permissionId) {
        $query = "SELECT * FROM update_untypical_work_to_permission(:type_work, :permission_id)";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute(array('type_work' => trim($typeWork), 'permission_id' => $permissionId));
    }

    public function isUntypicalWorkInPermission($permissionId) {
        $query = "SELECT * FROM is_untypical_work_in_permission(:permission_id)";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute(array('permission_id' => $permissionId));

        if($stmt->fetch()[0]) {
            return true;
        } else {
            return false;
        }

    }

    public function addAdditionToPermission($addition, $permissionId) {
        $query = "SELECT * FROM add_addition_to_permission(:addition, :permission_id)";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute(array('addition' => trim($addition), 'permission_id' => $permissionId));
    }

    public function getDescriptionOfPermission($permissionId) {
        $query = "SELECT * FROM get_description_of_permission(:permission_id)";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute(array('permission_id' => $permissionId));
        return $stmt->fetch()['description'];
    }

    public function getAdditionOfPermission($permissionId) {
        $query = "SELECT * FROM get_addition_of_permission(:permission_id)";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute(array('permission_id' => $permissionId));
        return $stmt->fetch()['addition'];
    }

    public function getUntypicalWorkOfPermission($permissionId) {
        $query = "SELECT * FROM get_untypical_work_of_permission(:permission_id)";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute(array('permission_id' => $permissionId));

        $arr = $stmt->fetch();

        if(isset($arr['name'])) {
         return $arr['name'];
        }

        return '';
    }

    public function getProtectionsOfPermission($permissionId) {
        $query = "SELECT * FROM get_protections_of_permission(:permission_id)";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute(array('permission_id' => $permissionId));
        return $stmt->fetchAll();
    }


}