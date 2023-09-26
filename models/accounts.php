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

    public function addInvite($name, $last_name, $login, $password, $responsibility, $company_id, $project_id)
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
            
            $participant_id = $this->db->lastInsertId();
            $_SESSION['proTSA_online'] = $participant_id;
            $list_participants = new list_participants();

            if ($list_participants->add($participant_id, $project_id)) {
                return true;
            } else {
                return false;
            }

        } else {
            return false;
        }
    }

    public function verifyLogin($login, $password)
    {
        $sql = "SELECT password, id FROM accounts WHERE login = :login";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":login", $login);
        $sql->execute();

        if ($sql->rowCount() > 0) {

            $array = $sql->fetch(PDO::FETCH_ASSOC);
            if (password_verify($password, $array['password'])) {
                $_SESSION['proTSA_online'] = $array['id'];
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function get($id)
    {

        $array = array();
        $sql = "SELECT name, last_name, login, responsibility, company_id, permission FROM accounts WHERE id = :id";
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

    public function getAll($filters)
    {
        $array = array();

        $where = array(
            '1=1'
        );

        if (!empty($filters['responsibility'])) {
            $where[] = "responsibility LIKE :responsibility";
        }

        $sql = "SELECT id, name, last_name, login, responsibility, company_id FROM accounts WHERE " . implode(' AND ', $where);
        $sql = $this->db->prepare($sql);

        if (!empty($filters['responsibility'])) {
            $sql->bindValue(":responsibility", $filters['responsibility']);
        }

        $sql->execute();

        if ($sql->rowCount() > 0) {
            $array = $sql->fetchAll(PDO::FETCH_ASSOC);
            return $array;
        } else {
            return 0;
        }
    }

    public function check_password($password, $id)
    {
        $sql = "SELECT password, id FROM accounts WHERE id = :id";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":id", $id);
        $sql->execute();
        if ($sql->rowCount() > 0) {
            $array = $sql->fetch(PDO::FETCH_ASSOC);
            if (password_verify($password, $array['password'])) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function check_login_exist($login)
    {
        $sql = "SELECT login FROM accounts WHERE login = :login";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":login", $login);
        $sql->execute();
        if ($sql->rowCount() > 0) {
            $array = $sql->fetch(PDO::FETCH_ASSOC);
            return true;
        } else {
            return false;
        }
    }


    public function recover_password($password, $login)
    {
        $sql = "UPDATE accounts SET password = :password WHERE login = :login";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":password", $password);
        $sql->bindValue(":login", $login);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }
}
