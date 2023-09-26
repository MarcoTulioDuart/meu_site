<?php

class list_basic_info extends Model
{

    public function add($type_ecu_id, $fail_safe_id)
    {
        $sql = "INSERT INTO list_basic_info (type_ecu_id, fail_safe_id) VALUES (:type_ecu_id, :fail_safe_id)";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":type_ecu_id", $type_ecu_id);
        $sql->bindValue(":fail_safe_id", $fail_safe_id);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function edit_responsibles($responsible_name, $responsible_email, $id) {
        $sql = "UPDATE list_basic_info 
        SET responsible_name = :responsible_name, responsible_email = :responsible_email 
        WHERE id = :id";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":id", $id);
        $sql->bindValue(":responsible_name", $responsible_name);
        $sql->bindValue(":responsible_email", $responsible_email);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function upload($upload_ecu_reference, $fail_safe_id)
    {
        $sql = "UPDATE list_basic_info SET upload_ecu_reference = :upload_ecu_reference WHERE fail_safe_id = :fail_safe_id";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":upload_ecu_reference", $upload_ecu_reference);
        $sql->bindValue(":fail_safe_id", $fail_safe_id);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function getAllEcus($fail_safe_id) {
        $sql = "SELECT lbi.id AS basic_info_id, lbi.type_ecu_id, te.name AS ecu_name
        FROM list_basic_info AS lbi
        INNER JOIN type_ecu AS te ON (te.id = lbi.type_ecu_id)
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

    public function getAll($fail_safe_id) {
        $sql = "SELECT lbi.id, lbi.type_ecu_id, lbi.responsible_name, lbi.responsible_email, lbi.upload_ecu_reference
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

    public function get($id) {
        $sql = "SELECT lbi.id, te.name AS ecu_name, lbi.responsible_name, lbi.responsible_email, lbi.upload_ecu_reference
        FROM list_basic_info AS lbi
        INNER JOIN type_ecu AS te ON (te.id = lbi.type_ecu_id)
        WHERE lbi.id = :id";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":id", $id);
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
