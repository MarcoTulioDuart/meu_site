<?php

class diagram_hardware extends Model
{

    public function add($software_integrations_id, $ecu_id, $diagram)
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

    public function getBySoftwareIntegrationsId($id)
    {
        $sql = "SELECT * FROM diagram_hardware WHERE software_integrations_id = :id";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":id", $id);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $array = $sql->fetch(PDO::FETCH_ASSOC);
            return $array;
        } else {
            return 0;
        }
    }

 



}
