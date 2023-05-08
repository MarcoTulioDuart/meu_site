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

}
?>