<?php

class data_can extends Model
{
    public function add($rede_can, $signal_name, $signal_function)
    {
        $sql = "INSERT INTO data_can (rede_can, signal_name, signal_function) VALUES (:rede_can, :signal_name, :signal_function)";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":rede_can", $rede_can);
        $sql->bindValue(":signal_name", $signal_name);
        $sql->bindValue(":signal_function", $signal_function);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function deleteDuplicates($rede_can)
    {
        $sql = "DELETE a
        FROM data_can AS a, data_can AS b 
        WHERE a.signal_name = b.signal_name
        AND b.rede_can = :rede_can
        AND a.signal_function = b.signal_function
        AND a.id < b.id";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":rede_can", $rede_can);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function getAll($filters)
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

        $sql = "SELECT id, rede_can, signal_name, signal_function FROM data_can WHERE " . implode(' AND ', $where) . " LIMIT 30";
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
