<?php

class list_parameters_vehicles extends Model
{

    public function add($parameters_integration_id, $project_id, $vehicle_id, $total_score)
    {
        $sql = "INSERT INTO list_parameters_vehicles (parameters_integration_id, project_id, vehicle_id, total_score) VALUES (:parameters_integration_id, :project_id, :vehicle_id, :total_score)";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":parameters_integration_id", $parameters_integration_id);
        $sql->bindValue(":vehicle_id", $vehicle_id);
        $sql->bindValue(":total_score", $total_score);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function edit($parameters_integration_id, $project_id, $vehicle_id, $total_score)
    {
        $sql = "UPDATE list_parameters_vehicles SET total_score = :total_score
        WHERE parameters_integration_id = :parameters_integration_id
        AND project_id = :project_id
        AND vehicle_id = :vehicle_id";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":parameters_integration_id", $parameters_integration_id);
        $sql->bindValue(":project_id", $project_id);
        $sql->bindValue(":vehicle_id", $vehicle_id);
        $sql->bindValue(":total_score", $total_score);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function getAll($project_id)
    {
        $sql = "SELECT lpv.total_score, v.family, v.vehicle
        FROM list_parameters_vehicles AS lpv
        INNER JOIN vehicles AS v ON (v.id = lpv.vehicle_id)
        WHERE project_id = :project_id";
        $sql = $this->db->prepare($sql);
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
