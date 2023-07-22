<?php

class data_parameters_aplicate extends Model
{
    public function add($pos, $sachnummer, $benennung, $codebedingung, $kem_ab, $werke, $pg_kz, $type, $parameters_integration_id, $project_id)
    {
        $sql = "INSERT INTO data_parameters_aplicate (pos, sachnummer, benennung, codebedingung, kem_ab, werke, pg_kz, type,parameters_integration_id, project_id) VALUES (:pos, :sachnummer, :benennung, :codebedingung, :kem_ab, :werke, :pg_kz, :type, :parameters_integration_id, :project_id)";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":pos", $pos);
        $sql->bindValue(":sachnummer", $sachnummer);
        $sql->bindValue(":benennung", $benennung);
        $sql->bindValue(":codebedingung", $codebedingung);
        $sql->bindValue(":kem_ab", $kem_ab);
        $sql->bindValue(":werke", $werke);
        $sql->bindValue(":pg_kz", $pg_kz);
        $sql->bindValue(":type", $type);
        $sql->bindValue(":parameters_integration_id", $parameters_integration_id);
        $sql->bindValue(":project_id", $project_id);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function getAll($filters, $parameters_integration_id, $project_id) {
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

        $sql = "SELECT id, type, benennung, codebedingung 
        FROM data_parameters_aplicate 
        WHERE " . implode(' AND ', $where) . 
        "AND parameters_integration_id = :parameters_integration_id 
        AND project_id = :project_id
        LIMIT 30";
        $sql = $this->db->prepare($sql);
        
        if (!empty($filters['type_parameter'])) {
            $sql->bindValue(":type", $filters['type_parameter']);
        }

        if(!empty($filters['search'])){
            $sql->bindValue(":search", "%" . $filters['search'] . "%");
        }
        $sql->bindValue(":parameters_integration_id", $parameters_integration_id);
        $sql->bindValue(":project_id", $project_id);
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