<?php
class DatabaseHelper{
    private $db;

    public function __construct($servername, $username, $password, $dbname, $port) {
        $this->db = new mysqli($servername, $username, $password, $dbname, $port);
        if ($this->db->connect_error) {
            die("Connection failed: " . $this->db->connect_error);
        }        
    }

    public function getPosts($nPost){
        $stmt = $this->db->prepare("SELECT Post_id, Img, Words, Day_posted, Time_posted, Tag_id, User_id FROM post LIMIT ?");
        $stmt->bind_param('i', $nPost);
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

    public function checkLogin($username, $password){
        $query = "SELECT User_id, Username FROM User_table WHERE username = ? AND passwrd = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('ss',$username, $password);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getLikes($postId){
        $query = "SELECT COUNT(Post_id) AS NumberOfLikes FROM Like_table WHERE Post_id = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i', $postId);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC)[0]["NumberOfLikes"];
    }

    public function getComment($postId){
        $query = "SELECT U.Username, U.Profile_img, C.Words, C.Day_posted, C.Time_posted FROM User_table AS U JOIN Comment AS C ON U.User_id = C.User_id WHERE C.Post_id = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i', $postId);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getFullPosts($nPost){
        $result = $this->getPosts($nPost);
        foreach($result as &$post){
            $user = $this->getUser($post["User_id"]);
            $post["Username"] = $user[0]["Username"];
            $post["UserProfilePic"] = $user[0]["Profile_img"];
            $post["Tag"] = $this->getTag($post["Tag_id"])[0]["Game_name"];
            $post["NumberOfLikes"] = $this->getLikes($post["Post_id"]);
            $post["Comments"] = $this->getComment($post["Post_id"]);
        }
        return $result;
    }
	
    public function getMostLikePosts($day, $nPost){
        $stmt = $this->db->prepare("SELECT COUNT(L.User_id) AS Likes, P.Post_id, Img, Words, Day_posted, Time_posted, Tag_id, P.User_id FROM like_table AS L JOIN post AS P ON L.Post_id=P.Post_id WHERE Day_posted = ? GROUP BY Post_id ORDER BY Likes DESC LIMIT ?");
        $stmt->bind_param('si', $day, $nPost);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getFullMostLikedPosts($day, $nPost){
        $result = $this->getMostLikePosts($day, $nPost);
        foreach($result as &$post){
            $user = $this->getUser($post["User_id"]);
            $post["Username"] = $user[0]["Username"];
            $post["UserProfilePic"] = $user[0]["Profile_img"];
            $post["Tag"] = $this->getTag($post["Tag_id"])[0]["Game_name"];
            $post["NumberOfLikes"] = $this->getLikes($post["Post_id"]);
            $post["Comments"] = $this->getComment($post["Post_id"]);
        }
        return $result;
    }
}
?>