<?php

class data_hardware extends Model
{
    public function add($name, $color)
    {
        $sql = "INSERT INTO data_hardware (name, color) VALUES (:name, :color)";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":name", $name);
        $sql->bindValue(":color", $color);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function getAll()
    {
        $array = array();
        $where = array(
            '1=1'
        );

        if (!empty($filters['name_can'])) {
            $where[] = "rede_can LIKE :rede_can";
        }

        if (!empty($filters['search']) && !empty($filters['name_can'])) {
            $where[] = "rede_can LIKE :rede_can AND signal_name LIKE :search";
        }

        $sql = "SELECT * FROM data_hardware WHERE " . implode(' AND ', $where) . " LIMIT 30";
        $sql = $this->db->prepare($sql);

        if (!empty($filters['name_can'])) {
            $sql->bindValue(":rede_can", $filters['name_can']);
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
