<?php

class data_parameters extends Model
{
    public function add($pos, $sachnummer, $benennung, $codebedingung, $kem_ab, $werke, $pg_kz, $type)
    {
        $sql = "INSERT INTO data_parameters (pos, sachnummer, benennung, codebedingung, kem_ab, werke, pg_kz, type) VALUES (:pos, :sachnummer, :benennung, :codebedingung, :kem_ab, :werke, :pg_kz, :type)";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":pos", $pos);
        $sql->bindValue(":sachnummer", $sachnummer);
        $sql->bindValue(":benennung", $benennung);
        $sql->bindValue(":codebedingung", $codebedingung);
        $sql->bindValue(":kem_ab", $kem_ab);
        $sql->bindValue(":werke", $werke);
        $sql->bindValue(":pg_kz", $pg_kz);
        $sql->bindValue(":type", $type);
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

        if (!empty($filters['type_parameter'])) {
            $where[] = "type LIKE :type";
        }

        if (!empty($filters['search']) && !empty($filters['type_parameter'])) {
            $where[] = "benennung LIKE :search OR codebedingung LIKE :search AND type LIKE :type";
        }

        $sql = "SELECT id, type, benennung, codebedingung FROM data_parameters WHERE " . implode(' AND ', $where) . " LIMIT 30";
        $sql = $this->db->prepare($sql);
        
        if (!empty($filters['type_parameter'])) {
            $sql->bindValue(":type", $filters['type_parameter']);
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
?>