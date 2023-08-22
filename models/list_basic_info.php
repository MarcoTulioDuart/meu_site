<?php

class list_basic_info extends Model
{

    public function add($list_ecu_id, $responsible_name, $responsible_email, $fail_safe_id)
    {
        $sql = "INSERT INTO list_basic_info (list_ecu_id, responsible_name, responsible_email, fail_safe_id) VALUES (:list_ecu_id, :responsible_name, :responsible_email, :fail_safe_id)";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":list_ecu_id", $list_ecu_id);
        $sql->bindValue(":responsible_name", $responsible_name);
        $sql->bindValue(":responsible_email", $responsible_email);
        $sql->bindValue(":fail_safe_id", $fail_safe_id);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function upload($upload_ecu_reference, $id, $fail_safe_id)
    {
        $sql = "UPDATE list_basic_info SET upload_ecu_reference = :upload_ecu_reference WHERE id = :id AND fail_safe_id = :fail_safe_id";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":id", $id);
        $sql->bindValue(":upload_ecu_reference", $upload_ecu_reference);
        $sql->bindValue(":fail_safe_id", $fail_safe_id);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function getAll($fail_safe_id) {
        $sql = "SELECT lbi.id, lbi.responsible_name, lbi.responsible_email, lbi.upload_ecu_reference
        FROM list_basic_info AS lbi
        WHERE fail_safe_id = :fail_safe_id";
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

    public function get($id, $fail_safe_id) {
        $sql = "SELECT lbi.id, lbi.responsible_name, lbi.responsible_email, lbi.upload_ecu_reference
        FROM list_basic_info AS lbi
        WHERE lbi.id = :id
        AND fail_safe_id = :fail_safe_id";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":id", $id);
        $sql->bindValue(":fail_safe_id", $fail_safe_id);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $array = $sql->fetch(PDO::FETCH_ASSOC);
            return $array;
        } else {
            return 0;
        }
    }

    public function delete($id) {
        $sql = "DELETE FROM list_basic_info WHERE id = :id";
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
