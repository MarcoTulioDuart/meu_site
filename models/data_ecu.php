<?php

class data_ecu extends Model
{
    public function add($name, $function, $acronimo)
    {
        $sql = "INSERT INTO data_ecu (name, function_ecu, acronimo) VALUES (:name, :function, :acronimo)";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":name", $name);
        $sql->bindValue(":function", $function);
        $sql->bindValue(":acronimo", $acronimo);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $data_ecu = new data_ecu;
            $data_ecu->deleteDuplicates();
            return true;
        } else {
            return false;
        }
    }
    
    public function deleteDuplicates()
    {
        $sql = "DELETE a
        FROM data_ecu AS a, data_ecu AS b 
        WHERE a.function = b.function
        AND a.acronimo = b.acronimo
        AND a.id < b.id ";
        $sql = $this->db->prepare($sql);
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

        if (!empty($filters['name_ecu'])) {
            $where[] = "name LIKE :name";
        }

        $sql = "SELECT id, name, function_ecu FROM data_ecu WHERE " . implode(' AND ', $where);
        $sql = $this->db->prepare($sql);
        
        if (!empty($filters['name_ecu'])) {
            $sql->bindValue(":name", $filters['name_ecu']);
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
?>