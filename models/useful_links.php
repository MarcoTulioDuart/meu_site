<?php

class useful_links extends Model
{
    public function add($url, $title)
    {
        $sql = "INSERT INTO useful_links (url, title) VALUES (:url, :title)";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":url", $url);
        $sql->bindValue(":title", $title);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function getAll() {

        $sql = "SELECT * FROM useful_links";
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
?>