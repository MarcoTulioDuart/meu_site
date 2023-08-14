<?php

class list_basic_info extends Model
{

    public function add($fail_safe_test_id, $project_id, $list_ecu_id, $responsible_name, $responsible_email, $upload_ecu_reference)
    {
        $sql = "INSERT INTO list_basic_info (fail_safe_test_id, project_id, list_ecu_id, responsible_name, responsible_email, upload_ecu_reference) VALUES (:fail_safe_test_id, :project_id, :list_ecu_id, :responsible_name, :responsible_email, :upload_ecu_reference)";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":fail_safe_test_id", $fail_safe_test_id);
        $sql->bindValue(":project_id", $project_id);
        $sql->bindValue(":list_ecu_id", $list_ecu_id);
        $sql->bindValue(":responsible_name", $responsible_name);
        $sql->bindValue(":responsible_email", $responsible_email);
        $sql->bindValue(":upload_ecu_reference", $upload_ecu_reference);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function getAll() {
        $sql = "SELECT lbi.id, lbi.project_id AS lbi_project_id, lbi.responsible_name, lbi.responsible_email, lbi.upload_ecu_reference
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
        $sql = "SELECT lbi.id, lbi.project_id AS lbi_project_id, lbi.responsible_name, lbi.responsible_email, lbi.upload_ecu_reference
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
