<?php

class maturityecusoftwarefunctions_software_informations_providers extends Model
{

    public function add($maturityecusoftwarefunctions_id, $responsible_name, $selected_ecu, $list_ecu_function)
    {
        $sql = "INSERT INTO maturityecusoftwarefunctions_software_informations_providers (maturityecusoftwarefunctions_id, responsible_name, selected_ecu, list_ecu_function) VALUES (:maturityecusoftwarefunctions_id, :responsible_name, :selected_ecu, :list_ecu_function)";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":maturityecusoftwarefunctions_id", $maturityecusoftwarefunctions_id);
        $sql->bindValue(":responsible_name", $responsible_name);
        $sql->bindValue(":selected_ecu", $selected_ecu);
        $sql->bindValue(":list_ecu_function", $list_ecu_function);
        $sql->execute();

        if ($sql->rowCount() > 0) {
          return $this->db->lastInsertId();
        } else {
            return false;
        }
    }

    public function edit($responsible_name, $selected_ecu, $list_ecu_function, $id)
    {
      
        $sql = "UPDATE maturityecusoftwarefunctions_software_informations_providers 
        SET responsible_name = :responsible_name, selected_ecu = :selected_ecu, list_ecu_function = :list_ecu_function  WHERE id = :id";
         
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":responsible_name", $responsible_name);
        $sql->bindValue(":selected_ecu", $selected_ecu);
        $sql->bindValue(":list_ecu_function", $list_ecu_function);
        $sql->bindValue(":id", $id);
        $sql->execute();
     

        if ($sql->rowCount() > 0) {
        
            return true;
        } else {
          
            return false;
        }
    }

    public function getByMaturityecusoftwarefunctionId($maturityecusoftwarefunctions_id)
    {
        $sql = "SELECT * FROM maturityecusoftwarefunctions_software_informations_providers WHERE maturityecusoftwarefunctions_id = :maturityecusoftwarefunctions_id";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":maturityecusoftwarefunctions_id", $maturityecusoftwarefunctions_id);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $array = $sql->fetch(PDO::FETCH_ASSOC);
            return $array;
        } else {
            return [];
        }
    }   


    public function editStep($id, $step, $percentage)
    {
      
        $sql = "UPDATE maturityecusoftwarefunctions_software_informations_providers 
        SET step_$step = step_$step + :step WHERE id = :id";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":id", $id);
        $sql->bindValue(":step", $percentage);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function getAll($filters = array())
    {
        $array = array();

        $where = array(
            '1=1'
        );

        if (!empty($filters['project_id'])) {
            $where[] = "maturityecusoftwarefunctions_software_informations_providers.project_id = :project_id";
        }

        if (!empty($filters['order'])) {
            $order = $filters['order'];
        } else {
            $order = "maturityecusoftwarefunctions_software_informations_providers.id";
        }

        $sql = "SELECT * 
        FROM maturityecusoftwarefunctions_software_informations_providers 
        WHERE project_id = :project_id AND " . implode(' AND ', $where) . "
        ORDER BY " . $order;

        $sql = $this->db->prepare($sql);

        if (!empty($filters['project_id'])) {
            $sql->bindValue(":project_id", $filters['project_id']);
        }

        $sql->execute();

        if ($sql->rowCount() > 0) {
            $array = $sql->fetchAll(PDO::FETCH_ASSOC);
            return $array;
        } else {
            return 0;
        }
    }
}
