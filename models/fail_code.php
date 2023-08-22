<?php

class fail_code extends Model
{

    public function add($vehicle, $date, $ecu, $fc, $fc_description, $cw, $fail_status, $solution, $list_baisc_info_id, $fail_safe_id)
    {
        $sql = "INSERT INTO fail_code (vehicle, date, ecu, fc, fc_description, cw, fail_status, solution, list_baisc_info_id, fail_safe_id) 
        VALUES (:vehicle, :date, :ecu, :fc, :fc_description, :cw, :fail_status, :solution, :list_baisc_info_id, :fail_safe_id)";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":vehicle", $vehicle);
        $sql->bindValue(":date", $date);
        $sql->bindValue(":ecu", $ecu);
        $sql->bindValue(":fc", $fc);
        $sql->bindValue(":fc_description", $fc_description);
        $sql->bindValue(":cw", $cw);
        $sql->bindValue(":fail_status", $fail_status);
        $sql->bindValue(":solution", $solution);
        $sql->bindValue(":list_baisc_info_id", $list_baisc_info_id);
        $sql->bindValue(":fail_safe_id", $fail_safe_id);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function getAll($fail_safe_id) {
        $sql = "SELECT fc.id, fc.vehicle, fc.date, fc.ecu, fc.fc, fc.fc_description, fc.cw, fc.fail_status, fc.solution
        FROM fail_code AS fc
        WHERE fc.fail_safe_id = :fail_safe_id";
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

    public function getAllListBasic($fail_safe_id, $list_baisc_info_id) {
        $sql = "SELECT fc.id, fc.vehicle, fc.date, fc.ecu, fc.fc, fc.fc_description, fc.cw, fc.fail_status, fc.solution
        FROM fail_code AS fc
        WHERE fc.fail_safe_id = :fail_safe_id 
        AND fc.list_baisc_info_id = :list_baisc_info_id";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":fail_safe_id", $fail_safe_id);
        $sql->bindValue(":list_baisc_info_id", $list_baisc_info_id);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $array = $sql->fetchAll(PDO::FETCH_ASSOC);
            return $array;
        } else {
            return 0;
        }
    }
    public function get($id) {
        $sql = "SELECT fc.id, fc.vehicle, fc.date, fc.ecu, fc.fc, fc.fc_description, fc.cw, fc.fail_status, fc.solution
        FROM fail_code AS fc
        WHERE fc.id = :id";
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
        $sql = "DELETE FROM fail_code WHERE id = :id";
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
