<?php

class accounts extends Model
{
    public function add($name, $last_name, $login, $password, $responsibility, $company_id)
    {
        $sql = "INSERT INTO accounts (name, last_name, login, password, responsibility, company_id) VALUES (:name, :last_name, :login, :password, :responsibility, :company_id)";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":name", $name);
        $sql->bindValue(":last_name", $last_name);
        $sql->bindValue(":login", $login);
        $sql->bindValue(":password", $password);
        $sql->bindValue(":responsibility", $responsibility);
        $sql->bindValue(":company_id", $company_id);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

}
