<?php

class points extends Model
{

    public function update_questions($point_1, $point_2, $point_3, $id)
    {
        $sql = "UPDATE points SET point_question_1 = :point_question_1, point_question_2 = :point_question_2, point_question_3 = :point_question_3 WHERE id = :id";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":point_question_1", $point_1);
        $sql->bindValue(":point_question_2", $point_2);
        $sql->bindValue(":point_question_3", $point_3);
        $sql->bindValue(":id", $id);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function get($id)
    {
        $array = array();

        $sql = "SELECT * FROM points WHERE id = :id";
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
}
