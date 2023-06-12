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

    public function diagram_hardwares_add($software_integrations_id, $ecu_id, $diagram)
    {
        $sql = "INSERT INTO diagram_hardware (software_integrations_id, ecu_id, diagram) VALUES (:software_integrations_id, :ecu_id, :diagram)";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":software_integrations_id", $software_integrations_id);
        $sql->bindValue(":ecu_id", $ecu_id);
        $sql->bindValue(":diagram", $diagram);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $software_integrations_id = $this->db->lastInsertId();
            return true;
        } else {
            return false;
        }
    }



}
