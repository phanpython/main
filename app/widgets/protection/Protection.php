<?php

namespace widgets\protection;

use core\DB;

class Protection
{
    protected $pdo;

    public function __construct() {
        $this->pdo = DB::getPDO();
    }

    /* На вход */

    public function setMaskingProtectionsEntrance($protectionId, $locations, $entrance_exit, $permissionId) {
        $query = "SELECT * FROM set_masking_protections_entrance(:protection_id, :locations, :entrance_exit, :permission_id)";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute(array('protection_id' => $protectionId, 'locations' => $locations, 'entrance_exit' => $entrance_exit, 'permission_id' => $permissionId));
    }

    /* На вход со втором */
    
    public function setMaskingProtectionsEntranceVtor($protectionId, $locations, $entrance_exit, $vtor, $permissionId) {
        $query = "SELECT * FROM set_masking_protections_entrance_vtor(:protection_id, :locations, :entrance_exit,:vtor , :permission_id)";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute(array('protection_id' => $protectionId, 'locations' => $locations, 'entrance_exit' => $entrance_exit,'vtor' =>  $vtor, 'permission_id' => $permissionId));
    }

    /* На выход */

    public function setMaskingProtectionsExit($protectionId, $entrance_exit, $permissionId) {
        $query = "SELECT * FROM set_masking_protections_exit(:protection_id, :entrance_exit, :permission_id)";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute(array('protection_id' => $protectionId, 'entrance_exit' => $entrance_exit, 'permission_id' => $permissionId));
    }
    
    /* ТУ */

    public function getProtectionsTu($tuname):array {
        $query = "SELECT * FROM get_protections_tu(:tuname)";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute(array('tuname' => $tuname));
        return $stmt->fetchAll();
    }

    public function getProtectionsTuSearch($tuname, $search):array {
        $query = "SELECT * FROM get_protections_tu_search(:tuname, :search)";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute(array('npsname' => $tuname, 'search' => $search));

        return $stmt->fetchAll();
    }


    /* НПС */ 

    public function getProtectionsNps($npsname):array {
        $query = "SELECT * FROM get_protections_nps(:npsname)";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute(array('npsname' => $npsname));
        return $stmt->fetchAll();
    }

    public function getProtectionsNpsSearch($npsname, $search):array {
        $query = "SELECT * FROM get_protections_nps_search(:npsname, :search)";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute(array('npsname' => $npsname, 'search' => $search));

        return $stmt->fetchAll();
    }


    /* ЛУ */

    public function getProtectionsLu($luname):array {
        $query = "SELECT * FROM get_protections_lu(:luname)";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute(array('luname' => $luname));
        return $stmt->fetchAll();
    }

    public function getProtectionsLuSearch($luname, $search):array {
        $query = "SELECT * FROM get_protections_lu_search(:luname, :search)";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute(array('luname' => $luname, 'search' => $search));

        return $stmt->fetchAll();
    }

    /* При вводе типовой работы  в разрешение добавляются защиты */

    public function setMaskingProtectionsFromTypicalWorks($protectionId, $vtorId, $entranceId, $objectsId, $permissionId):array {
        $query = "SELECT * FROM set_masking_protections_from_typical_works(:protection_id, :vtor_id, :entrance_id, :objects_id, :permission_id)";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute(array('protection_id' => $protectionId, 'vtor_id' => $vtorId, 'entrance_id' => $entranceId, 'objects_id' => $objectsId, 'permission_id' => $permissionId));

        return $stmt->fetchAll();
    }

    public function getMaskingProtectionsFromTypicalWorks($work, $permissionId):array {
        $query = "SELECT * FROM get_masking_protections_from_typical_works(:work, :permission_id)";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute(array('work' => $work, 'permission_id' => $permissionId));

        return $stmt->fetchAll();
    }

    /* Вернуть только те типы защит, у которых нет родителя */

    public function getTypesWithoutParent():array {
        $query = "SELECT * FROM get_types_without_parent";
        $stmt = $this->pdo->query($query);
        
        return $stmt->fetchAll();
    }

    
    public function getAllTypes():array {
        $query = "SELECT * FROM get_all_types";
        $stmt = $this->pdo->query($query);

        return $stmt->fetchAll();
    }

    public function getTypesChildren($types, $idParent):array {
        $result = [];

        foreach ($types as $type) {
            if($type['parent_id'] === $idParent) {
                $fl = true;

                foreach ($result as $item) {
                    if($item['name'] === $type['name']) {
                        $fl = false;
                    }
                }

                if($fl) {
                    $result[] = $type;
                }
            }
        }

        return $result;
    }

    public function setTypes() {
        $query = "SELECT * FROM get_types";
        $stmt = $this->pdo->query($query);

        $this->types = $stmt->fetchAll();
    }

    public function getTypes():array {
        return $this->types;
    }

}