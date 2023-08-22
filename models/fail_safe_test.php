<?php

class fail_safe_test extends Model
{

    public function add($participante_id)
    {
        $sql = "INSERT INTO fail_safe_test (participante_id) VALUES (:participante_id)";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":participante_id", $participante_id);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $_SESSION['safe_test_id_proTSA'] = $this->db->lastInsertId();
            return true;
        } else {
            return false;
        }
    }

    public function getAll() {
        $sql = "SELECT fst.id, fst.participante_id
        FROM fail_safe_test AS fst";
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
        $sql = "SELECT fst.id, fst.participante_id
        FROM fail_safe_test AS fst
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
        $sql = "DELETE FROM fail_code WHERE id = :id";
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
