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

    public function getResultParameters($parameters_integration_id, $project_id, $filters) {
        $array = array();

        //incompleto ainda
        $sql = "SELECT lpc.name_parameter
        FROM list_parameters_compare AS lpc

        WHERE parameters_integration_id = :parameters_integration_id
        AND dp.sachnummer " . $filters['format'] . " dpa.sachnummer
        OR dp.benennung " . $filters['format'] . " dpa.benennung
        OR dp.codebedingung " . $filters['format'] . " dpa.codebedingung
        OR dp.kem_ab " . $filters['format'] . " dpa.kem_ab
        OR dp.werke " . $filters['format'] . " dpa.werke
        OR dp.pg_kz " . $filters['format'] . " dpa.pg_kz";
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