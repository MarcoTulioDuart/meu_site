<?php

class releases_softwares extends Model
{

     
    public function add($software_integrations_id, $ecu_id, $releases_date, $releases_function)
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

    public function getByReleasesSoftware($id)
    {
        $sql = "SELECT releases_softwares.*, type_ecu.name 
        FROM releases_softwares
        INNER JOIN type_ecu ON (releases_softwares.ecu_id = type_ecu.id)
        WHERE software_integrations_id = :id";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":id", $id);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $array = $sql->fetchAll(PDO::FETCH_ASSOC);
            return $array;
        } else {
            return [];
        }
    }

    public function deleteBySoftwareIntegrationsId($id) {
        $sql = "DELETE FROM releases_softwares WHERE software_integrations_id = :id";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":id", $id);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }
}
