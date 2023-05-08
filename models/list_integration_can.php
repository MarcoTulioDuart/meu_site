<?php

class list_integration_can extends Model
{
    public function add($list_can_id, $project_id, $function_id)
    {
        $sql = "INSERT INTO list_integration_can (list_can_id, project_id, function_id) VALUES (:list_can_id, :project_id, :function_id)";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":list_can_id", $list_can_id);
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
}
