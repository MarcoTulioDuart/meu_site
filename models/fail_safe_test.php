<?php

class fail_safe_test extends Model
{

    public function add($project_id)
    {
        $sql = "INSERT INTO fail_safe_test (project_id) VALUES (:project_id)";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":project_id", $project_id);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $_SESSION['safe_test_id_proTSA'] = $this->db->lastInsertId();
            return true;
        } else {
            return false;
        }
    }

    public function getAll() {
        $sql = "SELECT fst.id AS fst_id, p.name AS pro_name, fst.project_id AS fst_project_id
        FROM fail_safe_test AS fst
        INNER JOIN projects AS p ON (p.id = fst.project_id)";
        $sql = $this->db->prepare($sql);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $array = $sql->fetchAll(PDO::FETCH_ASSOC);
            return $array;
        } else {
            return 0;
        }
    }

    public function get($id) {
        $sql = "SELECT fst.id, p.name, fst.project_id AS fst_project_id
        FROM fail_safe_test AS fst
        INNER JOIN projects AS p ON (p.id = lis.project_id)
        WHERE fst.id = :id";
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
        $sql = "DELETE FROM fail_safe_test WHERE id = :id";
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
