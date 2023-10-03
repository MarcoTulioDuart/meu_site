<?php

class maturityecusoftwarefunctions extends Model
{

    public function add($project_id)
    {
        $sql = "INSERT INTO maturityecusoftwarefunctions (project_id) VALUES (:project_id)";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":project_id", $project_id);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $maturityecusoftwarefunctions_id = $this->db->lastInsertId();
            return $maturityecusoftwarefunctions_id;
        } else {
            return false;
        }
    }

    public function ecu_maturityecusoftwarefunctions_add($maturityecusoftwarefunctions_id, $ecu_id)
    {
        $sql = "INSERT INTO ecu_maturityecusoftwarefunctions (maturityecusoftwarefunctions_id, ecu_id) VALUES (:maturityecusoftwarefunctions_id, :ecu_id)";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":maturityecusoftwarefunctions_id", $maturityecusoftwarefunctions_id);
        $sql->bindValue(":ecu_id", $ecu_id);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $maturityecusoftwarefunctions_id = $this->db->lastInsertId();
            return true;
        } else {
            return false;
        }
    }

    public function releases_software_add($maturityecusoftwarefunctions_id, $ecu_id, $releases_date, $releases_function)
    {
        $sql = "INSERT INTO releases_softwares (maturityecusoftwarefunctions_id, ecu_id, releases_date, releases_function) VALUES (:maturityecusoftwarefunctions_id, :ecu_id, :releases_date, :releases_function)";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":maturityecusoftwarefunctions_id", $maturityecusoftwarefunctions_id);
        $sql->bindValue(":ecu_id", $ecu_id);
        $sql->bindValue(":releases_date", $releases_date);
        $sql->bindValue(":releases_function", $releases_function);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $maturityecusoftwarefunctions_id = $this->db->lastInsertId();
            return true;
        } else {
            return false;
        }
    }



    public function get($id)
    {
        $sql = "SELECT * FROM maturityecusoftwarefunctions WHERE id = :id";
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
        $sql = "SELECT * FROM maturityecusoftwarefunctions WHERE project_id = :id";
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

    public function getLatestMaturityEcuSoftwareFunctions()
    {
        $sql = "SELECT * FROM maturityecusoftwarefunctions ORDER BY id DESC";
        $sql = $this->db->prepare($sql);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $array = $sql->fetch(PDO::FETCH_ASSOC);
            return $array;
        } else {
            return [];
        }
    }

    public function getSoftwareIntegrationsEcu($id)
    {
        $sql = "SELECT * 
        FROM ecu_maturityecusoftwarefunctions
        INNER JOIN type_ecu ON (ecu_maturityecusoftwarefunctions.ecu_id = type_ecu.id)
        WHERE maturityecusoftwarefunctions_id = :id";
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
        WHERE maturityecusoftwarefunctions_id = :id";
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
        $sql = "DELETE FROM maturityecusoftwarefunctions WHERE id = :id";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":id", $id);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function complete_stage($current_stage, $percentual_step, $maturityecusoftwarefunctions_id)
    {
      
        $sql = "UPDATE maturityecusoftwarefunctions 
        SET $current_stage = 1, total_step = total_step + :percentual_step  WHERE id = :id";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":id", $maturityecusoftwarefunctions_id);
        $sql->bindValue(":percentual_step", $percentual_step);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function getAll($filters = array())
    {
        $array = array();

        $where = array(
            '1=1'
        );

        if (!empty($filters['project_id'])) {
            $where[] = "maturityecusoftwarefunctions.project_id = :project_id";
        }

        if (!empty($filters['order'])) {
            $order = $filters['order'];
        } else {
            $order = "maturityecusoftwarefunctions.id";
        }

        $sql = "SELECT * 
        FROM maturityecusoftwarefunctions 
        WHERE project_id = :project_id AND " . implode(' AND ', $where) . "
        ORDER BY " . $order;

        $sql = $this->db->prepare($sql);

        if (!empty($filters['project_id'])) {
            $sql->bindValue(":project_id", $filters['project_id']);
        }

        $sql->execute();

        if ($sql->rowCount() > 0) {
            $array = $sql->fetchAll(PDO::FETCH_ASSOC);
            return $array;
        } else {
            return 0;
        }
    }
}
