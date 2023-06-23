<?php

class software_integrations extends Model
{

    public function add($project_id)
    {
        $sql = "INSERT INTO software_integrations (project_id) VALUES (:project_id)";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":project_id", $project_id);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $software_integrations_id = $this->db->lastInsertId();
            return $software_integrations_id;
        } else {
            return false;
        }
    }

    public function ecu_software_integrations_add($software_integrations_id, $ecu_id)
    {
        $sql = "INSERT INTO ecu_software_integrations (software_integrations_id, ecu_id) VALUES (:software_integrations_id, :ecu_id)";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":software_integrations_id", $software_integrations_id);
        $sql->bindValue(":ecu_id", $ecu_id);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $software_integrations_id = $this->db->lastInsertId();
            return true;
        } else {
            return false;
        }
    }

    public function releases_software_add($software_integrations_id, $ecu_id, $releases_date, $releases_function)
    {
        $sql = "INSERT INTO releases_softwares (software_integrations_id, ecu_id, releases_date, releases_function) VALUES (:software_integrations_id, :ecu_id, :releases_date, :releases_function)";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":software_integrations_id", $software_integrations_id);
        $sql->bindValue(":ecu_id", $ecu_id);
        $sql->bindValue(":releases_date", $releases_date);
        $sql->bindValue(":releases_function", $releases_function);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $software_integrations_id = $this->db->lastInsertId();
            return true;
        } else {
            return false;
        }
    }

    public function getByProjectId($id)
    {
        $sql = "SELECT * FROM software_integrations WHERE project_id = :id";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":id", $id);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $array = $sql->fetch(PDO::FETCH_ASSOC);
            return $array;
        } else {
            return [];
        }
    }



}
