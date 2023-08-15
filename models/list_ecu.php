<?php

class list_ecu extends Model
{
    public function add($ecu_id, $project_id, $data_ecu_id)
    {
        $sql = "INSERT INTO list_ecu (ecu_id, project_id, data_ecu_id) VALUES (:ecu_id, :project_id, :data_ecu_id)";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":ecu_id", $ecu_id);
        $sql->bindValue(":project_id", $project_id);
        $sql->bindValue(":data_ecu_id", $data_ecu_id);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function getFunction($project_id, $ecu_id, $data_ecu_id)
    {
        $sql = "SELECT * FROM list_ecu 
        WHERE project_id = :project_id
        AND ecu_id = :ecu_id
        AND data_ecu_id = :data_ecu_id";
        
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":ecu_id", $ecu_id);
        $sql->bindValue(":project_id", $project_id);
        $sql->bindValue(":data_ecu_id", $data_ecu_id);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function getAll($filters, $project_id)
    {
        $array = array();

        $where = array(
            '1=1'
        );

        if (!empty($filters['name_ecu'])) {
            $where[] = "t.name LIKE :name";
        }

        $sql = "SELECT t.name AS t_name, d.name AS d_name, d.*, le.id AS le_id
        FROM list_ecu AS le
        INNER JOIN type_ecu AS t ON (t.id = le.ecu_id)
        INNER JOIN data_ecu AS d ON (d.id = le.data_ecu_id)
        WHERE le.project_id = :project_id AND " . implode(' AND ', $where);
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":project_id", $project_id);

        if (!empty($filters['name_ecu'])) {
            $sql->bindValue(":name", $filters['name_ecu']);
        }

        $sql->execute();

        if ($sql->rowCount() > 0) {
            $array = $sql->fetchAll(PDO::FETCH_ASSOC);
            return $array;
        } else {
            return 0;
        }
    }

    public function getEcuProject($project_id)
    {
        $array = array();

        $sql = "SELECT DISTINCT b.id AS list_ecu_id, b.ecu_id, t.name AS t_name
        FROM list_ecu AS a, list_ecu AS b
        INNER JOIN type_ecu AS t ON (t.id = b.ecu_id)
        WHERE a.ecu_id != b.ecu_id
        AND b.project_id = :project_id 
        ORDER BY b.ecu_id";
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

    public function delete($project_id)
    {
        $sql = "DELETE FROM list_ecu WHERE project_id = :project_id";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":project_id", $project_id);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }
}
