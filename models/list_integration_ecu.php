<?php

class list_integration_ecu extends Model
{
    public function add($list_ecu_id, $project_id)
    {
        $sql = "INSERT INTO list_integration_ecu (list_ecu_id, project_id) VALUES (:list_ecu_id, :project_id)";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":list_ecu_id", $list_ecu_id);
        $sql->bindValue(":project_id", $project_id);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function addFile($id, $file)
    {
        $sql = "UPDATE list_integration_ecu SET file = :file WHERE id = :id";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":id", $id);
        $sql->bindValue(":file", $file);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function getAll($project_id, $e_name)
    {
        $array = array();

        $sql = "SELECT li.id AS li_id, e.name AS e_name, e.function_ecu AS e_function_ecu
        FROM list_integration_ecu AS li
        INNER JOIN list_ecu AS le ON (le.id = li.list_ecu_id)
        INNER JOIN data_ecu AS e ON (e.id = le.data_ecu_id)
        WHERE li.project_id = :project_id 
        AND e.name LIKE :e_name";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":project_id", $project_id);
        $sql->bindValue(":e_name", $e_name['name']);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $array = $sql->fetchAll(PDO::FETCH_ASSOC);
            return $array;
        } else {
            return 0;
        }
    }

    public function get($project_id, $list_ecu_id) {
        $array = array();
        $sql = "SELECT li.id AS li_id, e.function_ecu AS e_function_ecu, e.name AS e_name
        FROM list_integration_ecu AS li
        INNER JOIN list_ecu AS le ON (le.id = li.list_ecu_id)
        INNER JOIN data_ecu AS e ON (e.id = le.data_ecu_id)
        WHERE li.project_id = :project_id AND li.list_ecu_id = :list_ecu_id";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":project_id", $project_id);
        $sql->bindValue(":list_ecu_id", $list_ecu_id);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $array = $sql->fetch(PDO::FETCH_ASSOC);
            return $array;
        } else {
            return 0;
        }
    }

    public function answer_questions($question_1, $question_2, $question_3, $id)
    {
        $sql = "UPDATE list_integration_ecu SET question_1 = :question_1, question_2 = :question_2, question_3 = :question_3 WHERE id = :id";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":question_1", $question_1);
        $sql->bindValue(":question_2", $question_2);
        $sql->bindValue(":question_3", $question_3);
        $sql->bindValue(":id", $id);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function select_projects()
    {
        $sql = "SELECT DISTINCT p.name, p.id
        FROM list_integration_ecu AS le
        INNER JOIN projects AS p ON (p.id = le.project_id)";
        $sql = $this->db->prepare($sql);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $array = $sql->fetchAll(PDO::FETCH_ASSOC);
            return $array;
        } else {
            return 0;
        }
    }

    public function count_points($project_id, $name_ecu)
    {
        $sql = "SELECT lie.id AS lie_id, SUM(lie.question_1 + lie.question_2 + lie.question_3) AS score
        FROM list_integration_ecu AS lie
        INNER JOIN list_ecu AS le ON (le.id = lie.list_ecu_id)
        INNER JOIN data_ecu AS e ON (e.id = le.data_ecu_id)
        WHERE lie.project_id = :project_id
        AND e.name LIKE :name_ecu
        GROUP BY lie.id
        ORDER BY score DESC";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":project_id", $project_id);
        $sql->bindValue(":name_ecu", $name_ecu);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $array = $sql->fetchAll(PDO::FETCH_ASSOC);
            return $array;
        } else {
            return 0;
        }
    }
}
