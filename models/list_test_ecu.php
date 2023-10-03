<?php

class list_test_ecu extends Model
{

    public function add($code_id, $basic_info_id, $fail_safe_id)
    {
        $sql = "INSERT INTO list_test_ecu (code_id, basic_info_id, fail_safe_id) VALUES (:code_id, :basic_info_id, :fail_safe_id)";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":code_id", $code_id);
        $sql->bindValue(":basic_info_id", $basic_info_id);
        $sql->bindValue(":fail_safe_id", $fail_safe_id);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function getResultEcu($fail_safe_id, $basic_info_id) {
        $sql = "SELECT fc.ecu AS fc_ecu, fc.fc, fc.fc_description, fc.fail_status
        FROM list_test_ecu AS lte
        INNER JOIN fail_code AS fc ON (fc.id = lte.code_id)
        INNER JOIN list_basic_info AS lbi ON (lbi.id = lte.basic_info_id)
        INNER JOIN type_ecu AS te ON (te.id = lbi.type_ecu_id)
        WHERE lte.fail_safe_id = :fail_safe_id
        AND lte.basic_info_id = :basic_info_id
        AND fc.ecu = te.name";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":basic_info_id", $basic_info_id);
        $sql->bindValue(":fail_safe_id", $fail_safe_id);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $array = $sql->fetchAll(PDO::FETCH_ASSOC);
            return $array;
        } else {
            return 0;
        }
    }

    public function getSolutions($fail_safe_id) {
        $sql = "SELECT SUM(CASE WHEN fc.solution = 'not relevant' THEN 1 ELSE 0 END) as not_relevant,
        SUM(CASE WHEN fc.solution = 'unsolved' THEN 1 ELSE 0 END) as unsolved,
        SUM(CASE WHEN fc.solution = 'solved' THEN 1 ELSE 0 END) as solved
        FROM list_test_ecu AS lte
        INNER JOIN fail_code AS fc ON (fc.id = lte.code_id)
        WHERE fc.fail_safe_id = :fail_safe_id";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":fail_safe_id", $fail_safe_id);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $array = $sql->fetch(PDO::FETCH_ASSOC);
            return $array;
        } else {
            return 0;
        }
    }

    public function getAllResults($fail_safe_id) {
        $sql = "SELECT fc.ecu AS fc_ecu, fc.fc, fc.fc_description, fc.fail_status
        FROM list_test_ecu AS lte
        INNER JOIN fail_code AS fc ON (fc.id = lte.code_id)
        INNER JOIN list_basic_info AS lbi ON (lbi.id = lte.basic_info_id)
        INNER JOIN type_ecu AS te ON (te.id = lbi.type_ecu_id)
        WHERE lte.fail_safe_id = :fail_safe_id
        AND fc.ecu = te.name";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":fail_safe_id", $fail_safe_id);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $array = $sql->fetchAll(PDO::FETCH_ASSOC);
            return $array;
        } else {
            return 0;
        }
    }

    public function delete($id) {
        $sql = "DELETE FROM list_test_ecu WHERE id = :id";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":id", $id);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }
}
