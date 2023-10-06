<?php

class fail_code extends Model
{

    public function add($vehicle, $date, $ecu, $fc, $fc_description, $cw, $fail_status, $solution, $fail_safe_id)
    {
        $sql = "INSERT INTO fail_code (vehicle, date, ecu, fc, fc_description, cw, fail_status, solution, fail_safe_id) 
        VALUES (:vehicle, :date, :ecu, :fc, :fc_description, :cw, :fail_status, :solution, :fail_safe_id)";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":vehicle", $vehicle);
        $sql->bindValue(":date", $date);
        $sql->bindValue(":ecu", $ecu);
        $sql->bindValue(":fc", $fc);
        $sql->bindValue(":fc_description", $fc_description);
        $sql->bindValue(":cw", $cw);
        $sql->bindValue(":fail_status", $fail_status);
        $sql->bindValue(":solution", $solution);
        $sql->bindValue(":fail_safe_id", $fail_safe_id);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function getAllListBasic($fail_safe_id, $name_ecu)
    {
        $array = array();

        $sql = "SELECT fc.id, fc.vehicle, fc.date, fc.ecu, fc.fc, fc.fc_description, fc.cw, fc.fail_status, fc.solution
        FROM fail_code AS fc
        WHERE fc.ecu = :name_ecu 
        AND fc.fail_safe_id = :fail_safe_id";
        $sql = $this->db->prepare($sql);

        $sql->bindValue(":name_ecu", $name_ecu);
        $sql->bindValue(":fail_safe_id", $fail_safe_id);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $array = $sql->fetchAll(PDO::FETCH_ASSOC);
            return $array;
        } else {
            return 0;
        }
    }

    public function getAll($fail_safe_id)
    {
        $sql = "SELECT fc.id, fc.vehicle, fc.date, fc.ecu, fc.fc, fc.fc_description, fc.cw, fc.fail_status, fc.solution
        FROM fail_code AS fc
        WHERE fc.fail_safe_id = :fail_safe_id ";
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

    public function getAllVehicles($fail_safe_id)
    {
        $sql = "SELECT DISTINCT fc.id, fc.vehicle
        FROM fail_code AS fc
        WHERE fc.fail_safe_id = :fail_safe_id
        GROUP BY fc.vehicle
        ORDER BY fc.vehicle";
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

    public function get($id)
    {
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

    public function deleteNull($fail_safe_id)
    {
        $sql = "DELETE FROM fail_code
        WHERE fail_safe_id = :fail_safe_id
        AND vehicle IS NULL
        AND ecu IS NULL
        AND fc IS NULL
        AND fc_description IS NULL
        AND cw IS NULL
        AND fail_status IS NULL
        AND solution IS NULL";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":fail_safe_id", $fail_safe_id);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function editSolution($solution, $id) {
        $sql = "UPDATE fail_code SET solution = :solution WHERE id = :id";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":solution", $solution);
        $sql->bindValue(":id", $id);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function delete($id)
    {
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
