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
            $safe_test_id_proTSA = $this->db->lastInsertId();
            return $safe_test_id_proTSA;
        } else {
            return false;
        }
    }

    public function editGraphic($id, $graphic_upload)
    {
        $sql = "UPDATE fail_safe_test SET graphic_upload = :graphic_upload WHERE id = :id";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":id", $id);
        $sql->bindValue(":graphic_upload", $graphic_upload);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function getGraphic($id)
    {
        $sql = "SELECT graphic_upload
        FROM fail_safe_test
        WHERE id = :id";
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

    public function getAll($participante_id)
    {
        $sql = "SELECT fst.id AS fst_id, fst.participante_id
        FROM fail_safe_test AS fst
        WHERE fst.participante_id = :participante_id";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":participante_id", $participante_id);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $array = $sql->fetchAll(PDO::FETCH_ASSOC);
            return $array;
        } else {
            return 0;
        }
    }

    public function get($id)
    {
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

    public function delete($id)
    {
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
