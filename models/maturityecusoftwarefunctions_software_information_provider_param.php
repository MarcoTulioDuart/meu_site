<?php

class maturityecusoftwarefunctions_software_information_provider_param extends Model
{

     
    public function add($maturityecusoftwarefunctions_software_informations_providers_id, $pid, $fragment, $values_p)
    {
        echo "<pre>";
        $sql = "INSERT INTO maturityecusoftwarefunctions_software_information_provider_param (maturityecusoftwarefunctions_software_informations_providers_id, pid, fragment, values_p) VALUES (:maturityecusoftwarefunctions_software_informations_providers_id, :pid, :fragment, :values_p)";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":maturityecusoftwarefunctions_software_informations_providers_id", $maturityecusoftwarefunctions_software_informations_providers_id);
        $sql->bindValue(":pid", $pid);
        $sql->bindValue(":fragment", $fragment);
        $sql->bindValue(":values_p", $values_p);
        $sql->execute();

        if ($sql->rowCount() > 0) {            
            return true;
        } else {
            return false;
        }
    }

    public function getByReleasesSoftware($id)
    {
        $sql = "SELECT maturityecusoftwarefunctions_software_information_provider_param.*, type_ecu.name 
        FROM maturityecusoftwarefunctions_software_information_provider_param
        INNER JOIN type_ecu ON (maturityecusoftwarefunctions_software_information_provider_param.ecu_id = type_ecu.id)
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

    public function getParametersByProviderInformation($id)
    {
        $sql = "SELECT * 
        FROM maturityecusoftwarefunctions_software_information_provider_param       
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

    public function deleteBySoftwareIntegrationsId($id) {
        $sql = "DELETE FROM maturityecusoftwarefunctions_software_information_provider_param WHERE maturityecusoftwarefunctions_software_informations_providers_id = :id";
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
