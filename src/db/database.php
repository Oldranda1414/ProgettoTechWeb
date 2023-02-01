<?php
class DatabaseHelper{
    private $db;

    public function __construct($servername, $username, $password, $dbname, $port) {
        $this->db = new mysqli($servername, $username, $password, $dbname, $port);
        if ($this->db->connect_error) {
            die("Connection failed: " . $db->connect_error);
        }        
    }

    public function getPosts($numeroPost){
        $stmt = $this->db->prepare("SELECT Post_id, Immagine, Testo, Giorno, Ora, Tag_id, User_id FROM post LIMIT ?");
        $stmt->bind_param('i', $numeroPost);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);

    }

    public function getUser($user_id){
        $stmt = $this->db->prepare("SELECT User_id, Username, E-mail, Passwrd, Immagine_profilo FROM user_table WHERE User_id = ?");
        $stmt->bind_param('s', $user_id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getTag($tag_id){
        $stmt = $this->db->prepare("SELECT Tag_id, Nome_gioco FROM Tag WHERE Tag_id = ?");
        $stmt->bind_param('s', $tag_id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }
}
?>