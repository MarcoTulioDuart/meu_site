<?php

class maturityecusoftwarefunctions_informations_providers_releases extends Model
{

     
    public function add($maturityecusoftwarefunctions_software_informations_providers_id, $releases_date, $releases_desc)
    {
        
        $sql = "INSERT INTO maturityecusoftwarefunctions_informations_providers_releases (maturityecusoftwarefunctions_software_informations_providers_id, releases_date, releases_desc) VALUES (:maturityecusoftwarefunctions_software_informations_providers_id, :releases_date, :releases_desc)";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":maturityecusoftwarefunctions_software_informations_providers_id", $maturityecusoftwarefunctions_software_informations_providers_id);
        $sql->bindValue(":releases_date", $releases_date);
        $sql->bindValue(":releases_desc", $releases_desc);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $maturityecusoftwarefunctions_informations_providers_releases_id = $this->db->lastInsertId();
            
            return true;
        } else {
            return false;
        }
    }

    public function getByReleasesSoftware($id)
    {
        $sql = "SELECT maturityecusoftwarefunctions_informations_providers_releases.*, type_ecu.name 
        FROM maturityecusoftwarefunctions_informations_providers_releases
        INNER JOIN type_ecu ON (maturityecusoftwarefunctions_informations_providers_releases.ecu_id = type_ecu.id)
        WHERE maturityecusoftwarefunctions_software_informations_providers_id = :id";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":id", $id);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $array = $sql->fetchAll(PDO::FETCH_ASSOC);
            return $array;
        } else {
            return [];
        }
    }

    public function getReleasesByProviderInformation($id)
    {
        $sql = "SELECT * 
        FROM maturityecusoftwarefunctions_informations_providers_releases       
        WHERE maturityecusoftwarefunctions_software_informations_providers_id = :id";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":id", $id);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $array = $sql->fetchAll(PDO::FETCH_ASSOC);
            return $array;
        } else {
            return [];
        }
    }

    public function deleteAllByMaturityEcuSoftwareFunctionsSoftwareInformationsProvidersId($maturityecusoftwarefunctions_software_informations_providers_id){
        $sql = "DELETE FROM maturityecusoftwarefunctions_informations_providers_releases WHERE maturityecusoftwarefunctions_software_informations_providers_id = :maturityecusoftwarefunctions_software_informations_providers_id";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":maturityecusoftwarefunctions_software_informations_providers_id", $maturityecusoftwarefunctions_software_informations_providers_id);
        $sql->execute();

    }                                 
}
