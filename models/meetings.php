<?php

class meetings extends Model
{

    public function addMeeting($project_id, $title, $date_meeting, $model, $text = null)
    {
        $sql = "INSERT INTO meetings (project_id, title, date_meeting, model, text) VALUES(:project_id, :title, :date_meeting, :model, :text)";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":project_id", $project_id);
        $sql->bindValue(":title", $title);
        $sql->bindValue(":date_meeting", $date_meeting);
        $sql->bindValue(":model", $model);
        $sql->bindValue(":text", $text);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function getAll($project_id, $filters = array())
    {
        $array = array();

        $where = array(
            '1=1'
        );

        if (!empty($filters['name_ecu'])) {
            $where[] = "t.name LIKE :name";
        }

        if (!empty($filters['model'])) {
            $where[] = "meetings.model = :model";
        }

        if (!empty($filters['order'])) {
            $order = $filters['order'];
        } else {
            $order = "meetings.id";
        }

        $sql = "SELECT * 
        FROM meetings 
        WHERE project_id = :project_id AND " . implode(' AND ', $where) . "
        ORDER BY " . $order;

        $sql = $this->db->prepare($sql);

        if (!empty($filters['model'])) {
            $sql->bindValue(":model", $filters['model']);
        }

        $sql->bindValue(":project_id", $project_id);

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
        $array = array();

        $sql = "SELECT * FROM meetings WHERE id = :id";
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

    public function meetingConcluded($id, $text) {
        $sql = "UPDATE meetings SET text = :text WHERE id = :id";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":id", $id);
        $sql->bindValue(":text", $text);
        $sql->execute();

        if($sql->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }
          
    public function delete($project_id, $model) {
        $sql = "DELETE FROM meetings WHERE project_id = :project_id AND model = :model";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":project_id", $project_id);
        $sql->bindValue(":model", $model);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }
}
