<?php

class list_integration_can extends Model
{
    public function add($data_can_id, $project_id, $function_id)
    {
        $sql = "INSERT INTO list_integration_can (list_can_id, project_id, function_id) VALUES (:list_can_id, :project_id, :function_id)";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":list_can_id", $data_can_id);
        $sql->bindValue(":project_id", $project_id);
        $sql->bindValue(":function_id", $function_id);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    //Pegar os signals de cada function

    public function getSignalsFunctions($function_id, $project_id)
    {
        $sql = "SELECT lic.function_id, c.signal_name
        FROM list_integration_can AS lic
        INNER JOIN list_can AS lc ON (lc.id = lic.list_can_id)
        INNER JOIN data_can AS c ON (c.id = lc.data_can_id)
        WHERE lic.project_id = :project_id 
        AND lic.function_id = :function_id";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":project_id", $project_id);
        $sql->bindValue(":function_id", $function_id);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $array = $sql->fetchAll(PDO::FETCH_ASSOC);
            return $array;
        } else {
            return false;
        }
    }

    //Sinais em comum entre as funções

    public function commomMessages($project_id)
    {
        $sql = "SELECT DISTINCT c.signal_name, 

        (SELECT GROUP_CONCAT(CONCAT_WS(': ', e.name, e.function_ecu) SEPARATOR ', ')
        FROM list_integration_can
        INNER JOIN list_ecu AS le ON (le.id = function_id)
        INNER JOIN data_ecu AS e ON (e.id = le.data_ecu_id)
        WHERE list_can_id = lic.list_can_id) AS commom_functions
        
        FROM list_integration_can AS lic
        INNER JOIN data_can AS c ON (c.id = lic.list_can_id)
        WHERE lic.project_id = :project_id
        AND list_can_id IN (
        SELECT list_can_id
        FROM list_integration_can
        GROUP BY list_can_id
        HAVING COUNT(*) > 1)";
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
}
