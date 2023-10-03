<?php

class list_test_vehicle extends Model
{

    public function add($vehicle_code_id, $fail_safe_id)
    {
        $sql = "INSERT INTO list_test_vehicle (vehicle_code_id, fail_safe_id) VALUES (:vehicle_code_id, :fail_safe_id)";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":vehicle_code_id", $vehicle_code_id);
        $sql->bindValue(":fail_safe_id", $fail_safe_id);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function getAllResults($fail_safe_id)
    {
        $sql = "SELECT fc.vehicle,

            (SELECT DISTINCT GROUP_CONCAT(
                CONCAT_WS(' ', '♦', fca.ecu, ':', fca.fc, ' ➠ ', 'Responsável : ', 
                    (SELECT lbi.responsible_name
                    FROM list_basic_info AS lbi
                    INNER JOIN type_ecu AS te ON (te.id = lbi.type_ecu_id)
                    WHERE te.name LIKE fca.ecu
                    AND lbi.fail_safe_id = :fail_safe_id)
                ) SEPARATOR ' <br> ') 
            FROM list_test_vehicle AS ltva
            INNER JOIN fail_code AS fca ON (fca.id = ltva.vehicle_code_id)
            WHERE ltva.fail_safe_id = :fail_safe_id
            AND fca.vehicle = fc.vehicle) AS ecus

        FROM list_test_vehicle AS ltv
        INNER JOIN fail_code AS fc ON (fc.id = ltv.vehicle_code_id)
        WHERE ltv.fail_safe_id = :fail_safe_id
        GROUP BY fc.vehicle";
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

    public function delete($id)
    {
        $sql = "DELETE FROM list_test_vehicle WHERE id = :id";
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
