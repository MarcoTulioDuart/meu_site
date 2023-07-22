<?php

class list_parameters_compare extends Model
{ 
    public function add($parameters_integration_id, $project_id, $name_parameter) {
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

    public function get() {

    }

    public function getAllParameters() {

    }
}