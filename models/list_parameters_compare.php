<?php

class list_parameters_compare extends Model
{
    public function add($parameters_integration_id, $project_id, $name_parameter)
    {
        $sql = "INSERT INTO list_parameters_compare (parameters_integration_id, project_id, name_parameter) VALUES(:parameters_integration_id, :project_id, :name_parameter)";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":parameters_integration_id", $parameters_integration_id);
        $sql->bindValue(":project_id", $project_id);
        $sql->bindValue(":name_parameter", $name_parameter);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function get($parameters_integration_id, $project_id)
    {
        $sql = "SELECT *
        FROM list_parameters_compare
        WHERE parameters_integration_id = :parameters_integration_id
        AND project_id = :project_id";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":parameters_integration_id", $parameters_integration_id);
        $sql->bindValue(":project_id", $project_id);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function getResultParameters($parameters_integration_id, $project_id, $format)
    {
        $array = array();

        $sql = "SELECT dpa.id, dpa.type, dpa.pos, dpa.sachnummer, dpa.benennung, dpa.codebedingung, dpa.kem_ab, dpa.werke, dpa.pg_kz
        FROM data_parameters_aplicate AS dpa
        WHERE dpa.project_id = :project_id
        AND dpa.parameters_integration_id = :parameters_integration_id
        AND dpa.sachnummer " . $format . " (
        SELECT dp.sachnummer
        FROM list_parameters_compare AS lpc
        INNER JOIN projects AS p ON (p.id = lpc.project_id)
        INNER JOIN list_parameters AS lp ON (lp.project_id = p.id)
        INNER JOIN data_parameters AS dp ON (dp.id = lp.data_parameters_id)
        WHERE lpc.parameters_integration_id = :parameters_integration_id
        AND lpc.project_id = :project_id
		AND dp.type LIKE lpc.name_parameter)";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":parameters_integration_id", $parameters_integration_id);
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
