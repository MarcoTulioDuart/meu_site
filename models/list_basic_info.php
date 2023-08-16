<?php

class list_basic_info extends Model
{

    public function add($list_ecu_id, $responsible_name, $responsible_email)
    {
        $sql = "INSERT INTO list_basic_info (list_ecu_id, responsible_name, responsible_email) VALUES (:list_ecu_id, :responsible_name, :responsible_email)";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":list_ecu_id", $list_ecu_id);
        $sql->bindValue(":responsible_name", $responsible_name);
        $sql->bindValue(":responsible_email", $responsible_email);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $_SESSION['safe_test_id_proTSA'] = $this->db->lastInsertId();
            return true;
        } else {
            return false;
        }
    }

    public function upload($upload_ecu_reference, $id)
    {
        $sql = "UPDATE list_basic_info SET upload_ecu_reference = :upload_ecu_reference WHERE id = :id";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":id", $id);
        $sql->bindValue(":upload_ecu_reference", $upload_ecu_reference);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function getAll() {
        $sql = "SELECT lbi.id, lbi.responsible_name, lbi.responsible_email, lbi.upload_ecu_reference
        FROM list_basic_info AS lbi";
        $sql = $this->db->prepare($sql);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $array = $sql->fetchAll(PDO::FETCH_ASSOC);
            return $array;
        } else {
            return 0;
        }
    }

    public function get($id) {
        $sql = "SELECT lbi.id, lbi.responsible_name, lbi.responsible_email, lbi.upload_ecu_reference
        FROM list_basic_info AS lbi
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
