<?php
class DatabaseHelper{
    private $db;

    public function __construct($servername, $username, $password, $dbname, $port) {
        $this->db = new mysqli($servername, $username, $password, $dbname, $port);
        if ($this->db->connect_error) {
            die("Connection failed: " . $this->db->connect_error);
        }        
    }

    public function getPosts($numeroPost){
        $stmt = $this->db->prepare("SELECT Post_id, Img, Words, Day_posted, Time_posted, Tag_id, User_id FROM post LIMIT ?");
        $stmt->bind_param('i', $numeroPost);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);

    }

    public function getUser($user_id){
        $stmt = $this->db->prepare("SELECT User_id, Username, E_mail, Passwrd, Profile_img FROM user_table WHERE User_id = ?");
        $stmt->bind_param('s', $user_id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getTag($tag_id){
        $stmt = $this->db->prepare("SELECT Tag_id, Game_name FROM Tag WHERE Tag_id = ?");
        $stmt->bind_param('s', $tag_id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }
}
?>