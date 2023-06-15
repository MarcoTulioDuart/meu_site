<?php

class integration_signals extends Model
{

    public function add($project_id)
    {
        $sql = "INSERT INTO integration_signals (project_id) VALUES (:project_id)";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":project_id", $project_id);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $_SESSION['signals_id_proTSA'] = $this->db->lastInsertId();
            return true;
        } else {
            return false;
        }
    }

    public function addComment($id, $comment)
    {
        $sql = "UPDATE integration_signals SET comment = :comment
        WHERE id = :id";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":comment", $comment);
        $sql->bindValue(":id", $id);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function getAll() {
        $sql = "SELECT lis.id, p.name
        FROM integration_signals AS lis
        INNER JOIN projects AS p ON (p.id = lis.project_id)";
        $sql = $this->db->prepare($sql);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $array = $sql->fetchAll(PDO::FETCH_ASSOC);
            return $array;
        } else {
            return 0;
        }
    }

}
