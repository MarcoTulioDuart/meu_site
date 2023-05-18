<?php

class type_ecu extends Model
{
    public function add($name)
    {
        $sql = "INSERT INTO type_ecu (name) VALUES (:name)";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":name", $name);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function getAll() {
        $array = array();

        $sql = "SELECT * FROM type_ecu";
        $sql = $this->db->prepare($sql);

        $sql->execute();

        if ($sql->rowCount() > 0) {
            $array = $sql->fetchAll(PDO::FETCH_ASSOC);
            return $array;
        } else {
            return 0;
        }
    }

    public function getAllExceptOne($filters) {
        $array = array();

        $where = array(
            '1=1'
        );

        for ($i=0; $i < count($filters['name_ecu']); $i++) { 
            if (!empty($filters['name_ecu'][$i])) {
                $where[] = "name != :name" . $i;
            }
        }
        

        $sql = "SELECT * FROM type_ecu WHERE" . implode(' AND ', $where);
        $sql = $this->db->prepare($sql);

        for ($i=0; $i < count($filters['name_ecu']); $i++) { 
            if (!empty($filters['name_ecu'][$i])) {
                $sql->bindValue(":name" . $i, $filters['name_ecu'][$i]);
            }
        }
        

        $sql->execute();

        if ($sql->rowCount() > 0) {
            $array = $sql->fetchAll(PDO::FETCH_ASSOC);
            return $array;
        } else {
            return 0;
        }
    }

    public function getId($filters) {
        $where = array(
            '1=1'
        );

        if (!empty($filters['name_ecu'])) {
            $where[] = "name LIKE :name";
        }

        $sql = "SELECT id FROM type_ecu WHERE " . implode(' AND ', $where);
        $sql = $this->db->prepare($sql);

        if (!empty($filters['name_ecu'])) {
            $sql->bindValue(":name", $filters['name_ecu']);
        }

        $sql->execute();

        if ($sql->rowCount() > 0) {
            $array = $sql->fetch(PDO::FETCH_ASSOC);
            return $array;
        } else {
            return 0;
        }
    }

    public function getName($id) {
        $sql = "SELECT name FROM type_ecu WHERE id = :id";
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
        $sql = "DELETE FROM type_ecu WHERE id = :id";
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
