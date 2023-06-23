<?php

class integration_plan extends Model
{
    public function add($software_integrations_id, $ecu_id, $physical_resources, $available_resources, $test_date, $pending_item)
    {
        $sql = "INSERT INTO integration_plan (software_integrations_id, ecu_id, physical_resources, available_resources, test_date, pending_item) VALUES (:software_integrations_id, :ecu_id, :physical_resources, :available_resources, :test_date, :pending_item)";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":software_integrations_id", $software_integrations_id);
        $sql->bindValue(":ecu_id", $ecu_id);
        $sql->bindValue(":physical_resources", $physical_resources);
        $sql->bindValue(":available_resources", $available_resources);
        $sql->bindValue(":test_date", $test_date);
        $sql->bindValue(":pending_item", $pending_item);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function getAll($filters) {
        $array = array();

        $where = array(
            '1=1'
        );

        if (!empty($filters['type_parameter'])) {
            $where[] = "type LIKE :type";
        }

        if (!empty($filters['search']) && !empty($filters['type_parameter'])) {
            $where[] = "benennung LIKE :search OR codebedingung LIKE :search AND type LIKE :type";
        }

        $sql = "SELECT id, type, benennung, codebedingung FROM integration_plan WHERE " . implode(' AND ', $where) . " LIMIT 30";
        $sql = $this->db->prepare($sql);
        
        if (!empty($filters['type_parameter'])) {
            $sql->bindValue(":type", $filters['type_parameter']);
        }

        if(!empty($filters['search'])){
            $sql->bindValue(":search", "%" . $filters['search'] . "%");
        }

        $sql->execute();

        if ($sql->rowCount() > 0) {
            $array = $sql->fetchAll(PDO::FETCH_ASSOC);
            return $array;
        } else {
            return [];
        }
    }

}
?>