<?php

class maturityecusoftwareunctions extends Model
{

    public function add($project_id)
    {
        $sql = "INSERT INTO maturityecusoftwareunctions (project_id) VALUES (:project_id)";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":project_id", $project_id);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $maturityecusoftwareunctions_id = $this->db->lastInsertId();
            return $maturityecusoftwareunctions_id;
        } else {
            return false;
        }
    }

    public function ecu_maturityecusoftwareunctions_add($maturityecusoftwareunctions_id, $ecu_id)
    {
        $sql = "INSERT INTO ecu_maturityecusoftwareunctions (maturityecusoftwareunctions_id, ecu_id) VALUES (:maturityecusoftwareunctions_id, :ecu_id)";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":maturityecusoftwareunctions_id", $maturityecusoftwareunctions_id);
        $sql->bindValue(":ecu_id", $ecu_id);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $maturityecusoftwareunctions_id = $this->db->lastInsertId();
            return true;
        } else {
            return false;
        }
    }

    public function releases_software_add($maturityecusoftwareunctions_id, $ecu_id, $releases_date, $releases_function)
    {
        $sql = "INSERT INTO releases_softwares (maturityecusoftwareunctions_id, ecu_id, releases_date, releases_function) VALUES (:maturityecusoftwareunctions_id, :ecu_id, :releases_date, :releases_function)";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":maturityecusoftwareunctions_id", $maturityecusoftwareunctions_id);
        $sql->bindValue(":ecu_id", $ecu_id);
        $sql->bindValue(":releases_date", $releases_date);
        $sql->bindValue(":releases_function", $releases_function);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $maturityecusoftwareunctions_id = $this->db->lastInsertId();
            return true;
        } else {
            return false;
        }
    }



    public function get($id)
    {
        $sql = "SELECT * FROM maturityecusoftwareunctions WHERE id = :id";
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

    public function getByProjectId($id)
    {
        $sql = "SELECT * FROM maturityecusoftwareunctions WHERE project_id = :id";
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

    public function getSoftwareIntegrationsEcu($id)
    {
        $sql = "SELECT * 
        FROM ecu_maturityecusoftwareunctions
        INNER JOIN type_ecu ON (ecu_maturityecusoftwareunctions.ecu_id = type_ecu.id)
        WHERE maturityecusoftwareunctions_id = :id";
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

 

    public function getByReleasesSoftware($id)
    {
        $sql = "SELECT releases_softwares.*, type_ecu.name 
        FROM releases_softwares
        INNER JOIN type_ecu ON (releases_softwares.ecu_id = type_ecu.id)
        WHERE maturityecusoftwareunctions_id = :id";
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

    public function delete($id) {
        $sql = "DELETE FROM maturityecusoftwareunctions WHERE id = :id";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":id", $id);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function editStep($id, $step, $percentage)
    {
      
        $sql = "UPDATE maturityecusoftwareunctions 
        SET step_$step = step_$step + :step WHERE id = :id";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":id", $id);
        $sql->bindValue(":step", $percentage);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }
}
