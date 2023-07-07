<?php

class parameters_integration extends Model
{

    public function add($project_id)
    {
        $sql = "INSERT INTO parameters_integration (project_id) VALUES (:project_id)";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":project_id", $project_id);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $_SESSION['parameters_id_proTSA'] = $this->db->lastInsertId();
            return true;
        } else {
            return false;
        }
    }

    public function getAll() {
        $sql = "SELECT pi.id AS pi_id, p.id AS pro_id, p.name AS pro_name
        FROM parameters_integration AS pi
        INNER JOIN projects AS p ON (p.id = pi.project_id)";
        $sql = $this->db->prepare($sql);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $array = $sql->fetchAll(PDO::FETCH_ASSOC);
            return $array;
        } else {
            return 0;
        }
    }

}
