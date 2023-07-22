<?php

class list_parameters extends Model
{
    public function add($data_parameters_id, $ecu_id, $project_id)
    {
        $sql = "INSERT INTO list_parameters (data_parameters_id, ecu_id, project_id) VALUES (:data_parameters_id, :ecu_id, :project_id)";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":data_parameters_id", $data_parameters_id);
        $sql->bindValue(":ecu_id", $ecu_id);
        $sql->bindValue(":project_id", $project_id);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function getAll($project_id) {
        $array = array();

        $sql = "SELECT p.*, te.name AS te_name
        FROM list_parameters AS lp
        INNER JOIN data_parameters AS p ON (p.id = lp.data_parameters_id) 
        INNER JOIN type_ecu AS te ON (te.id = lp.ecu_id)
        WHERE lp.project_id = :project_id";
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
    
    public function delete($project_id) {
        $sql = "DELETE FROM list_parameters WHERE project_id = :project_id";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":project_id", $project_id);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }
    
    public function getParameterProject($project_id)
    {
        $array = array();

        $sql = "SELECT DISTINCT p.type
        FROM list_parameters AS a, list_parameters AS b
        INNER JOIN data_parameters AS p ON (p.id = b.data_parameters_id)
        WHERE b.project_id = :project_id";
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
}
?>