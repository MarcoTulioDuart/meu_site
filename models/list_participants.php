<?php

class list_participants extends Model
{
    public function add($participant_id, $project_id)
    {
        $sql = "INSERT INTO list_participants (participant_id, project_id) VALUES (:participant_id, :project_id)";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":participant_id", $participant_id);
        $sql->bindValue(":project_id", $project_id);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function getAll($project_id) {
        $array = array();

        $sql = "SELECT CONCAT(a.name, ' ', a.last_name) AS full_name, a.company_id, a.responsibility, a.login, a.id
        FROM list_participants AS lpa
        INNER JOIN accounts AS a ON (a.id = lpa.participant_id) 
        WHERE lpa.project_id = :project_id";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":project_id", $project_id);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $array = $sql->fetchAll(PDO::FETCH_ASSOC);
            return $array;
        } else {
            return 0;
        }
    }
        
    public function delete($project_id) {
        $sql = "DELETE FROM list_participants WHERE project_id = :project_id";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":project_id", $project_id);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

}
?>