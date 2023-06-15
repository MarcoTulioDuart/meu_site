<?php

class list_signals_function extends Model
{

    public function add($list_ecu_id, $integration_signals_id)
    {
        $sql = "INSERT INTO list_signals_function (list_ecu_id, integration_signals_id) VALUES (:list_ecu_id, :integration_signals_id)";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":list_ecu_id", $list_ecu_id);
        $sql->bindValue(":integration_signals_id", $integration_signals_id);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function get($integration_signals_id, $list_ecu_id)
    {
        $sql = "SELECT ls.id AS ls_id, e.function_ecu AS e_function_ecu, e.name AS e_name
        FROM list_signals_function AS ls
        INNER JOIN list_ecu AS le ON (le.id = ls.list_ecu_id)
        INNER JOIN data_ecu AS e ON (e.id = le.data_ecu_id)
        WHERE ls.integration_signals_id = :integration_signals_id AND ls.list_ecu_id = :list_ecu_id";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":list_ecu_id", $list_ecu_id);
        $sql->bindValue(":integration_signals_id", $integration_signals_id);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $array = $sql->fetch(PDO::FETCH_ASSOC);
            return $array;
        } else {
            return 0;
        }
    }

    public function getAll($integration_signals_id)
    {
        $sql = "SELECT ls.id AS ls_id, e.function_ecu AS function_ecu, e.name AS e_name
        FROM list_signals_function AS ls
        INNER JOIN list_ecu AS le ON (le.id = ls.list_ecu_id)
        INNER JOIN data_ecu AS e ON (e.id = le.data_ecu_id)
        WHERE ls.integration_signals_id = :integration_signals_id";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":integration_signals_id", $integration_signals_id);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $array = $sql->fetchAll(PDO::FETCH_ASSOC);
            return $array;
        } else {
            return 0;
        }
    }

    public function addDescription($list_ecu_id, $integration_signals_id, $description)
    {
        $sql = "UPDATE list_signals_function 
        SET description = :description 
        WHERE integration_signals_id = :integration_signals_id 
        AND list_ecu_id = :list_ecu_id";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":list_ecu_id", $list_ecu_id);
        $sql->bindValue(":integration_signals_id", $integration_signals_id);
        $sql->bindValue(":description", $description);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function mainFunction($list_ecu_id, $integration_signals_id, $main_function)
    {
        $sql = "UPDATE list_signals_function 
        SET main_function = :main_function 
        WHERE integration_signals_id = :integration_signals_id 
        AND list_ecu_id = :list_ecu_id";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":list_ecu_id", $list_ecu_id);
        $sql->bindValue(":integration_signals_id", $integration_signals_id);
        $sql->bindValue(":main_function", $main_function);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function getMainFunction($integration_signals_id)
    {
        $sql = "SELECT le.id AS le_id, e.name AS e_name, e.function_ecu AS e_function
        FROM list_signals_function AS lsf
        INNER JOIN list_ecu AS le ON (le.id = lsf.list_ecu_id)
        INNER JOIN data_ecu AS e ON (e.id = le.data_ecu_id)
        WHERE lsf.main_function = 1
        AND lsf.integration_signals_id = :integration_signals_id";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":integration_signals_id", $integration_signals_id);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $array = $sql->fetch(PDO::FETCH_ASSOC);
            return $array;
        } else {
            return false;
        }
    }

    public function getCommomFunction($integration_signals_id)
    {
        $sql = "SELECT le.id AS le_id, e.name AS e_name, e.function_ecu AS e_function
        FROM list_signals_function AS lsf
        INNER JOIN list_ecu AS le ON (le.id = lsf.list_ecu_id)
        INNER JOIN data_ecu AS e ON (e.id = le.data_ecu_id)
        WHERE lsf.main_function = 2
        AND lsf.integration_signals_id = :integration_signals_id";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":integration_signals_id", $integration_signals_id);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $array = $sql->fetch(PDO::FETCH_ASSOC);
            return $array;
        } else {
            return false;
        }
    }
}
