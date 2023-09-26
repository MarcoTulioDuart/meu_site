<?php

class projects extends Model
{
    public function add($name, $admin_project)
    {
        $sql = "INSERT INTO projects (name, admin_project) VALUES (:name, :admin_project)";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":name", $name);
        $sql->bindValue(":admin_project", $admin_project);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $_SESSION['project_protsa'] = $this->db->lastInsertId();
            return true;
        } else {
            return false;
        }
    }

    public function check_name_exist($name)
    {
        $sql = "SELECT name FROM projects WHERE name = :name";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":name", $name);
        $sql->execute();
        if ($sql->rowCount() > 0) {
            $array = $sql->fetch(PDO::FETCH_ASSOC);
            return true;
        } else {
            return false;
        }
    }

    public function getAll($id) {
        $sql = "SELECT DISTINCT p.id, p.name AS pro_name, CONCAT(a.name, ' ', a.last_name) AS part_name
        FROM projects AS p
        LEFT JOIN list_participants AS lpa ON (p.id = lpa.project_id)
        LEFT JOIN accounts AS a ON (a.id = lpa.participant_id)
        WHERE lpa.participant_id = :id";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":id", $id);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $array = $sql->fetchAll(PDO::FETCH_ASSOC);
            return $array;
        } else {
            return 0;
        }
    }

    public function get($id) {
        $sql = "SELECT DISTINCT id, name, admin_project
        FROM projects WHERE id = :id";
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

    public function delete($id) {
        $sql = "DELETE FROM projects WHERE id = :id";
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
?>