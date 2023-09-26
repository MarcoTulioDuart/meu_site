<?php

class list_can extends Model
{
    public function add($data_can_id, $ecu_id, $project_id)
    {
        $sql = "INSERT INTO list_can (data_can_id, ecu_id, project_id) VALUES (:data_can_id, :ecu_id, :project_id)";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":data_can_id", $data_can_id);
        $sql->bindValue(":ecu_id", $ecu_id);
        $sql->bindValue(":project_id", $project_id);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function getAll($project_id)
    {
        $array = array();

        $sql = "SELECT c.*, te.name AS te_name
        FROM list_can AS lc
        INNER JOIN data_can AS c ON (c.id = lc.data_can_id)
        INNER JOIN type_ecu AS te ON (te.id = lc.ecu_id)
        WHERE lc.project_id = :project_id";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":project_id", $project_id);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $array = $sql->fetchAll(PDO::FETCH_ASSOC);
            return $array;
        } else {
            return 0;
        }
    }

    public function getCanProject($project_id, $ecu_id)
    {
        $sql = "SELECT DISTINCT dc.rede_can AS dc_rede_can
        FROM list_can AS lc
        INNER JOIN data_can AS dc ON (dc.id = lc.data_can_id)
        WHERE lc.project_id = :project_id AND lc.ecu_id = :ecu_id";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":project_id", $project_id);
        $sql->bindValue(":ecu_id", $ecu_id);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $array = $sql->fetchAll(PDO::FETCH_ASSOC);
            return $array;
        } else {
            return 0;
        }
    }

    public function delete($project_id)
    {
        $sql = "DELETE FROM list_can WHERE project_id = :project_id";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":project_id", $project_id);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }
    
    public function getAllInProject($filters, $ecu_id, $project_id) {
        $array = array();

        $where = array(
            '1=1'
        );

        if (!empty($filters['name_can'])) {
            $where[] = "dc.rede_can LIKE :rede_can";
        }

        if (!empty($filters['search']) && !empty($filters['name_can'])) {
            $where[] = "dc.rede_can LIKE :rede_can AND dc.signal_name LIKE :search";
        }

        $sql = "SELECT dc.id AS dc_id, lc.id AS lc_id, dc.rede_can, dc.signal_name 
        FROM list_can AS lc
        INNER JOIN data_can AS dc ON (dc.id = lc.data_can_id)
        WHERE lc.project_id = :project_id AND lc.ecu_id = :ecu_id
        AND " . implode(' AND ', $where) . " 
        LIMIT 30";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":project_id", $project_id);
        $sql->bindValue(":ecu_id", $ecu_id);

        if (!empty($filters['name_can'])) {
            $sql->bindValue(":rede_can", $filters['name_can']);
        }

        if(!empty($filters['search'])){
            $sql->bindValue(":search", "%" . $filters['search'] . "%");
        }

        $sql->execute();

        if ($sql->rowCount() > 0) {
            $array = $sql->fetchAll(PDO::FETCH_ASSOC);
            return $array;
        } else {
            return [];
        }
    }
}
