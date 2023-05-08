<?php

class type_parameters extends Model
{
    public function add($name)
    {
        $sql = "INSERT INTO type_parameters (name) VALUES (:name)";
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

        $sql = "SELECT * FROM type_parameters";
        $sql = $this->db->prepare($sql);

        $sql->execute();

        if ($sql->rowCount() > 0) {
            $array = $sql->fetchAll(PDO::FETCH_ASSOC);
            return $array;
        } else {
            return 0;
        }
    }

    public function delete($id) {
        $sql = "DELETE FROM type_parameters WHERE id = :id";
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
?>