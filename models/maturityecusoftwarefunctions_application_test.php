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
   
    public function edit($maturityecusoftwarefunctions_application_test_id, $assembler_email, $email_description, $result_file)
    {
      
        $sql = "UPDATE maturityecusoftwarefunctions_application_test
        SET assembler_email = :assembler_email, email_description = :email_description, result_file = :result_file WHERE id = :id";
        
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":assembler_email", $assembler_email);
        $sql->bindValue(":email_description", $email_description);
        $sql->bindValue(":result_file", $result_file);
        $sql->bindValue(":id", $maturityecusoftwarefunctions_application_test_id);
        $sql->execute();
     

        if ($sql->rowCount() > 0) {
           return true;
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
