<?php

class vehicles extends Model
{
    public function add($family, $vehicle)
    {
        $sql = "INSERT INTO vehicles (family, vehicle) VALUES (:family, :vehicle)";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":family", $family);
        $sql->bindValue(":vehicle", $vehicle);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function getAll() {
        $sql = "SELECT * FROM vehicles";
        $sql = $this->db->prepare($sql);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $array = $sql->fetchAll(PDO::FETCH_ASSOC);
            return $array;
        } else {
            return 0;
        }
    }
    
    public function get($id) {
        $sql = "SELECT * FROM vehicles WHERE id = :id";
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
}
?>