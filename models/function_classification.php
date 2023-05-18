<?php

class function_classification extends Model
{

    public function add($integration_ecu_id, $score, $project_id)
    {
        $sql = "INSERT INTO function_classification (integration_ecu_id, score, project_id) VALUES (:integration_ecu_id, :score, :project_id)";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":integration_ecu_id", $integration_ecu_id);
        $sql->bindValue(":score", $score);
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
        $sql = "SELECT * FROM function_classification 
        WHERE project_id = :project_id 
        ORDER BY score DESC";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":project_id", $project_id);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $array = $sql->fetchAll(PDO::FETCH_ASSOC);
            return $array;
        } else {
            return false;
        }
    }

    public function classification($classification, $id)
    {
        $sql = "UPDATE function_classification SET classification = :classification 
        WHERE id = :id";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":classification", $classification);
        $sql->bindValue(":id", $id);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function getResult($project_id)
    {
        $sql = "SELECT le.id, e.function_ecu AS e_function, fc.score AS fc_score, fc.classification AS fc_classification, 
        (SELECT GROUP_CONCAT(CONCAT_WS(' ', '♦ ', c.signal_name) SEPARATOR '<br><br>')
        FROM list_integration_can AS lic
        INNER JOIN data_can AS c ON (c.id = lic.list_can_id)
        WHERE lic.project_id = :project_id AND lic.function_id = le.id) AS signals,
        lie.question_1, lie.question_2, lie.question_3
        FROM function_classification AS fc
        INNER JOIN list_integration_ecu AS lie ON (lie.id = fc.integration_ecu_id)
        INNER JOIN list_ecu AS le ON (le.id = lie.list_ecu_id)
        INNER JOIN data_ecu AS e ON (e.id = le.data_ecu_id)
        WHERE fc.project_id = :project_id ORDER BY fc.score DESC";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":project_id", $project_id);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $array = $sql->fetchAll(PDO::FETCH_ASSOC);
            return $array;
        } else {
            return false;
        }
    }

    public function getCustomer($project_id)
    {
        $sql = "SELECT lie.id AS function_id, fc.classification, e.function_ecu
        FROM function_classification AS fc
        INNER JOIN list_integration_ecu AS lie ON (lie.id = fc.integration_ecu_id)
        INNER JOIN list_ecu AS le ON (le.id = lie.list_ecu_id)
        INNER JOIN data_ecu AS e ON (e.id = le.data_ecu_id)
        WHERE fc.project_id = :project_id
        AND fc.classification LIKE 'Função Cliente'";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":project_id", $project_id);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $array = $sql->fetchAll(PDO::FETCH_ASSOC);
            return $array;
        } else {
            return false;
        }
    }

    public function correctCustomer($classification, $integration_ecu_id, $project_id)
    {
        $sql = "UPDATE function_classification SET classification = :classification
        WHERE integration_ecu_id != :integration_ecu_id
        AND project_id = :project_id";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":classification", $classification);
        $sql->bindValue(":integration_ecu_id", $integration_ecu_id);
        $sql->bindValue(":project_id", $project_id);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }
}
