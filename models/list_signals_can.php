<?php

class list_signals_can extends Model
{

    public function add($data_can_id, $list_ecu_id, $integration_signals_id, $input_or_output)
    {
        $sql = "INSERT INTO list_signals_can (data_can_id, list_ecu_id, integration_signals_id, input_or_output) VALUES (:data_can_id, :list_ecu_id, :integration_signals_id, :input_or_output)";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":data_can_id", $data_can_id);
        $sql->bindValue(":list_ecu_id", $list_ecu_id);
        $sql->bindValue(":integration_signals_id", $integration_signals_id);
        $sql->bindValue(":input_or_output", $input_or_output);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function getAll($integration_signals_id, $list_ecu_id)
    {
        $array = array();

        $sql = "SELECT ls.id AS ls_id, c.signal_name AS c_name, c.signal_function AS c_function, 
        c.rede_can AS c_rede_can, ls.status AS ls_status, ls.comment AS ls_comment
        FROM list_signals_can AS ls
        INNER JOIN data_can AS c ON (c.id = ls.data_can_id)
        WHERE ls.integration_signals_id = :integration_signals_id 
        AND ls.list_ecu_id = :list_ecu_id";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":integration_signals_id", $integration_signals_id);
        $sql->bindValue(":list_ecu_id", $list_ecu_id);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $array = $sql->fetchAll(PDO::FETCH_ASSOC);
            return $array;
        } else {
            return 0;
        }
    }


    public function answer_questions($integration_signals_id, $id, $list_ecu_id, $available_type)
    {
        $sql = "UPDATE list_signals_can SET available_type = :available_type 
        WHERE integration_signals_id = :integration_signals_id
        AND id = :id
        AND list_ecu_id = :list_ecu_id";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":id", $id);
        $sql->bindValue(":list_ecu_id", $list_ecu_id);
        $sql->bindValue(":integration_signals_id", $integration_signals_id);
        $sql->bindValue(":available_type", $available_type);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function getSignalsFunction($le_id, $integration_signals_id)
    {
        $sql = "SELECT c.rede_can, c.signal_name AS c_signal_name, c.signal_function AS c_signal_function, lsc.available_type AS lsc_available_type
        FROM list_signals_can AS lsc
        INNER JOIN data_can AS c ON (c.id = lsc.data_can_id)
        WHERE lsc.input_or_output = 1
        AND lsc.list_ecu_id = :le_id
        AND lsc.integration_signals_id = :integration_signals_id
        AND c.signal_name IN (
		SELECT ca.signal_name 
		FROM list_signals_can AS lsca
        INNER JOIN data_can AS ca ON (ca.id = lsca.data_can_id)
        WHERE lsca.input_or_output = 1
		GROUP BY ca.signal_name
		HAVING COUNT(*) > 1)";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":le_id", $le_id);
        $sql->bindValue(":integration_signals_id", $integration_signals_id);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $array = $sql->fetchAll(PDO::FETCH_ASSOC);
            return $array;
        } else {
            return false;
        }
    }

    public function editStatus($id, $status, $comment)
    {
        $sql = "UPDATE list_signals_can SET status = :status, comment = :comment 
        WHERE id = :id";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":id", $id);
        $sql->bindValue(":status", $status);
        $sql->bindValue(":comment", $comment);

        $sql->execute();

        if ($sql->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }
}
