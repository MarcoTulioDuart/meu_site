<?php

class maturityecusoftwarefunctions_application_test extends Model
{

    public function add($maturityecusoftwarefunctions_id, $assembler_email, $email_description, $result_file)
    {
        $sql = "INSERT INTO maturityecusoftwarefunctions_application_test (maturityecusoftwarefunctions_id, assembler_email, email_description, result_file) VALUES (:maturityecusoftwarefunctions_id, :assembler_email, :email_description, :result_file)";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":maturityecusoftwarefunctions_id", $maturityecusoftwarefunctions_id);
        $sql->bindValue(":assembler_email", $assembler_email);
        $sql->bindValue(":email_description", $email_description);
        $sql->bindValue(":result_file", $result_file);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $array = $sql->fetch(PDO::FETCH_ASSOC);
            return $array;
            
        } else {
            return false;
        }
    }
   
    public function edit($maturityecusoftwarefunctions_application_test_id, $list_ecu_function, $description_function_software, $motivation_applying_function_software, $parameters, $releases_date, $releases_desc, $report1, $report2)
    {
      
        $sql = "UPDATE maturityecusoftwarefunctions_application_test 
        SET list_ecu_function = :list_ecu_function, description_function_software = :description_function_software, motivation_applying_function_software = :motivation_applying_function_software, report1 = :report1, report2 = :report2 WHERE id = :id";
         
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":list_ecu_function", $list_ecu_function);
        $sql->bindValue(":description_function_software", $description_function_software);
        $sql->bindValue(":motivation_applying_function_software", $motivation_applying_function_software);
        $sql->bindValue(":report1", $report1);
        $sql->bindValue(":report2", $report2);
        $sql->bindValue(":id", $maturityecusoftwarefunctions_application_test_id);
        $sql->execute();
     

        if ($sql->rowCount() > 0) {
            $maturityecusoftwarefunctions_software_information_provider_param = new maturityecusoftwarefunctions_software_information_provider_param();//continuar
            $maturityecusoftwarefunctions_software_information_provider_param->deleteAllByMaturityEcuSoftwareFunctionsSoftwareInformationsProvidersId($maturityecusoftwarefunctions_application_test_id);
                        
            foreach($parameters['pid'] as $key => $item){
                $maturityecusoftwarefunctions_software_information_provider_param->add($maturityecusoftwarefunctions_application_test_id, $item, $parameters['fragment'][$key], $parameters['values'][$key]);
               
            }  

            $maturityecusoftwarefunctions_informations_providers_releases = new maturityecusoftwarefunctions_informations_providers_releases();
            $maturityecusoftwarefunctions_informations_providers_releases->deleteAllByMaturityEcuSoftwareFunctionsSoftwareInformationsProvidersId($maturityecusoftwarefunctions_application_test_id);
            foreach($releases_date as $key => $item){
                $maturityecusoftwarefunctions_informations_providers_releases->add($maturityecusoftwarefunctions_application_test_id, $item, $releases_desc[$key]);
            }
        } else {
          
            return false;
        }
    }    

    public function getByMaturityEcuSoftwareFunctions_id($maturityecusoftwarefunctions_id)
    {
        $sql = "SELECT * 
        FROM maturityecusoftwarefunctions_application_test
        WHERE maturityecusoftwarefunctions_application_test.maturityecusoftwarefunctions_id = :maturityecusoftwarefunctions_id";
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
      
        $sql = "UPDATE maturityecusoftwarefunctions_application_test 
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
            $where[] = "maturityecusoftwarefunctions_application_test.project_id = :project_id";
        }

        if (!empty($filters['order'])) {
            $order = $filters['order'];
        } else {
            $order = "maturityecusoftwarefunctions_application_test.id";
        }

        $sql = "SELECT * 
        FROM maturityecusoftwarefunctions_application_test 
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
