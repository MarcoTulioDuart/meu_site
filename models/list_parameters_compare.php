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

    public function get()
    {
    }

    public function getResultParameters($parameters_integration_id, $project_id, $filters)
    {
        $array = array();

        $sql = "SELECT dp.id, dp.type, dp.sachnummer, dp.benennung
        FROM list_parameters_compare AS lpc
        INNER JOIN projects AS p ON (p.id = lpc.project_id)
        INNER JOIN list_parameters AS lp ON (lp.project_id = p.id)
        INNER JOIN data_parameters AS dp ON (dp.id = lp.data_parameters_id)
        WHERE lpc.project_id = :project_id
        AND lpc.parameters_integration_id = :parameters_integration_id
        AND dp.type LIKE lpc.name_parameter
        AND dp.sachnummer ". $filters['format'] ." (
        SELECT dpa.sachnummer
        FROM data_parameters_aplicate AS dpa
        WHERE dpa.parameters_integration_id = :parameters_integration_id
        AND dpa.project_id = :project_id)";
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
