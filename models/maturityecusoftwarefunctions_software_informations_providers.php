<?php

class maturityecusoftwarefunctions_software_informations_providers extends Model
{

    public function add($maturityecusoftwarefunctions_id, $list_ecu_function, $description_function_software, $motivation_applying_function_software, $parameters, $releases_date, $releases_desc, $report1, $report2)
    {
        $sql = "INSERT INTO maturityecusoftwarefunctions_software_informations_providers (maturityecusoftwarefunctions_id, list_ecu_function, description_function_software, motivation_applying_function_software, report1, report2) VALUES (:maturityecusoftwarefunctions_id, :list_ecu_function, :description_function_software, :motivation_applying_function_software, :report1, :report2)";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":maturityecusoftwarefunctions_id", $maturityecusoftwarefunctions_id);
        $sql->bindValue(":list_ecu_function", $list_ecu_function);
        $sql->bindValue(":description_function_software", $description_function_software);
        $sql->bindValue(":motivation_applying_function_software", $motivation_applying_function_software);
        $sql->bindValue(":report1", $report1);
        $sql->bindValue(":report2", $report2);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $maturityecusoftwarefunctions_software_informations_providers_id = $this->db->lastInsertId();
            $maturityecusoftwarefunctions_informations_providers_releases = new maturityecusoftwarefunctions_informations_providers_releases();
            foreach($releases_date as $key => $item){
                $maturityecusoftwarefunctions_informations_providers_releases->add($maturityecusoftwarefunctions_software_informations_providers_id, $item, $releases_desc[$key]);
            }
            $maturityecusoftwarefunctions_software_information_provider_param = new maturityecusoftwarefunctions_software_information_provider_param();//continuar
            
                        
            foreach($parameters['pid'] as $key => $item){
                $maturityecusoftwarefunctions_software_information_provider_param->add($maturityecusoftwarefunctions_software_informations_providers_id, $item, $parameters['fragment'][$key], $parameters['values'][$key]);
               
            }         
            

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
