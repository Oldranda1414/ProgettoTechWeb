<?php
class DatabaseHelper
{
   private $db;

   public function __construct($servername, $username, $password, $dbname, $port)
   {
      $this->db = new mysqli($servername, $username, $password, $dbname, $port);
      if ($this->db->connect_error) {
         die("Connection failed: " . $this->db->connect_error);
      }
   }

   //selection queries start here ------------------------------------------------------------------------------------------------------------


   //TODO returns an array containing the notifications, that haven't still been read, referring to the user with username $username
   public function getNotifications($username){
      $query = "SELECT N.Notification_type, F.Username AS Follower_Username, F.Profile_img AS Follower_Profile_img, 
               Commenter.Username AS Commenter_Username, Commenter.Profile_img AS Commenter_Profile_img, 
               C.Post_id AS Commented_Post_id, N.Liked_Post_id, Liker.Username AS Liker_Username, 
               Liker.Profile_img AS Liker_Profile_img, N.DT 
               FROM notifications AS N 
               JOIN user_table AS U ON N.User_id=U.User_id 
               LEFT JOIN user_table AS F ON F.User_id=N.Follower_User_id 
               LEFT JOIN comment AS C ON C.Comment_id=N.Comment_id 
               LEFT JOIN user_table AS Commenter ON Commenter.User_id=C.User_id 
               LEFT JOIN user_table AS Liker ON Liker.User_id=N.Like_User_id 
               WHERE U.Username = ? AND NOT N.Notified ORDER BY N.DT DESC";
      $stmt = $this->db->prepare($query);
      $stmt->bind_param('s', $username);
      $stmt->execute();
      $result = $stmt->get_result();
      return $result->fetch_all(MYSQLI_ASSOC);
   }

   //returns data referring to post with $postId as Post_id
   public function getPostById($postId){
      $stmt = $this->db->prepare("SELECT P.Post_id, P.Img, P.Words, P.DT, P.User_id, U.Username, U.Profile_img, T.Game_name, IFNULL(L.Likes,0) AS Likes
                                 FROM (((post AS P 
                                 JOIN user_table AS U ON P.User_id=U.User_id) 
                                 JOIN tag AS T ON P.Tag_id=T.Tag_id) 
                                 LEFT JOIN (SELECT Post_id, COUNT(User_id) AS Likes 
                                             FROM Like_table GROUP BY Post_id) 
                                 AS L ON P.Post_id=L.Post_id)
                                 WHERE P.Post_id = ?");
      $stmt->bind_param('i', $postId);
      $stmt->execute();
      $result = $stmt->get_result();
      return $result->fetch_all(MYSQLI_ASSOC)["0"];

   }

   //returns an assoc array containing comments referring to post with $postId as Post_id
   public function getComments($postId)
   {
      $query = "SELECT U.Username, U.Profile_img, C.Words, C.DT FROM User_table AS U JOIN Comment AS C ON U.User_id = C.User_id WHERE C.Post_id = ? ORDER BY C.DT";
      $stmt = $this->db->prepare($query);
      $stmt->bind_param('i', $postId);
      $stmt->execute();
      $result = $stmt->get_result();
      return $result->fetch_all(MYSQLI_ASSOC);
   }

   //start of post retrieval functions -------------------------------------------------------------------------------

   //retrieves post data for the latest $n posts
   //note that the only data missing is about comments related to each post
   public function getLatestNPosts($sessionUserId, $offset, $limit){
      $stmt = $this->db->prepare("SELECT P.Post_id, P.Img, P.Words, P.DT, P.User_id, U.Username, U.Profile_img, T.Game_name, ? AS session_ID, IFNULL(Likes.Likes,0) AS Likes, (L.User_id IS NOT NULL) AS Liked,
                                 counter.n AS Number_of_posts
                                 FROM (((post AS P 
                                 JOIN user_table AS U ON P.User_id=U.User_id) 
                                 JOIN tag AS T ON P.Tag_id=T.Tag_id) 
                                 LEFT JOIN Like_table AS L ON P.Post_id=L.Post_id AND L.User_id = ?
                                 LEFT JOIN (SELECT Post_id, COUNT(User_id) AS Likes 
                                             FROM Like_table GROUP BY Post_id) 
                                 AS Likes ON P.Post_id=Likes.Post_id)
                                 CROSS JOIN (SELECT COUNT(Post_id) AS n FROM POST) AS counter 
                                 ORDER BY P.DT DESC LIMIT ?, ?");
      $stmt->bind_param('ssii', $sessionUserId, $sessionUserId, $offset, $limit);
      $stmt->execute();
      $result = $stmt->get_result();
      return $result->fetch_all(MYSQLI_ASSOC);
   }

   //retrieves post data for the $n most liked posts of the day $day
   //note that the only data missing is about comments related to each post
   public function getMostLikedPosts($sessionUserId, $day, $n)
   {
      $stmt = $this->db->prepare("SELECT P.Post_id, P.Img, P.Words, P.DT, P.User_id, U.Username, U.Profile_img, T.Game_name, ? AS session_ID, IFNULL(Likes.Likes,0) AS Likes, (L.User_id IS NOT NULL) AS Liked,
                                 counter.n AS Number_of_posts
                                 FROM (((post AS P 
                                 JOIN user_table AS U ON P.User_id=U.User_id) 
                                 JOIN tag AS T ON P.Tag_id=T.Tag_id) 
                                 LEFT JOIN Like_table AS L ON P.Post_id=L.Post_id AND L.User_id = ?
                                 LEFT JOIN (SELECT Post_id, COUNT(User_id) AS Likes 
                                             FROM Like_table GROUP BY Post_id) 
                                 AS Likes ON P.Post_id=Likes.Post_id)
                                 CROSS JOIN (SELECT COUNT(Post_id) AS n FROM POST) AS counter
                                 WHERE P.DT<DATE_ADD(?, INTERVAL 1 DAY) AND P.DT>?
                                 ORDER BY Likes.Likes DESC LIMIT ?");
      $stmt->bind_param('ssssi', $sessionUserId, $sessionUserId, $day, $day, $n);
      $stmt->execute();
      $result = $stmt->get_result();
      return $result->fetch_all(MYSQLI_ASSOC);
   }

   //retrieves post data for the latest $n posts posted by user with Username $username
   //note that the only data missing is about comments related to each post
   public function getPostsByUser($sessionUserId, $username, $offset, $limit)
   {
      $stmt = $this->db->prepare("SELECT P.Post_id, P.Img, P.Words, P.DT, P.User_id, U.Username, U.Profile_img, T.Game_name, ? AS session_ID, IFNULL(Likes.Likes,0) AS Likes, (L.User_id IS NOT NULL) AS Liked, 
                                 counter.n AS Number_of_posts
                                 FROM post AS P 
                                 JOIN user_table AS U ON P.User_id=U.User_id
                                 JOIN tag AS T ON P.Tag_id=T.Tag_id
                                 LEFT JOIN Like_table AS L ON P.Post_id=L.Post_id AND L.User_id = ?
                                 LEFT JOIN (SELECT Post_id, COUNT(User_id) AS Likes 
                                             FROM Like_table GROUP BY Post_id) 
                                 AS Likes ON P.Post_id=Likes.Post_id 
                                 CROSS JOIN (SELECT COUNT(Post_id) AS n FROM POST) AS counter 
                                 WHERE U.Username= ? 
                                 ORDER BY P.DT DESC LIMIT ?, ?");
      $stmt->bind_param('sssii', $sessionUserId, $sessionUserId, $username, $offset, $limit);
      $stmt->execute();
      $result = $stmt->get_result();
      return $result->fetch_all(MYSQLI_ASSOC);
   }

   //returns posts with matching words to $words, ordered by date
   public function getPostsByWords($sessionUserId, $words, $offset, $limit){
      $stmt = $this->db->prepare("SELECT P.Post_id, P.Img, P.Words, P.DT, P.User_id, U.Username, U.Profile_img, T.Game_name, ? AS session_ID, IFNULL(L.Likes,0) AS Likes, (L.User_id IS NOT NULL) AS Liked, 
                                 counter.n AS Number_of_posts
                                 FROM (((post AS P 
                                 JOIN user_table AS U ON P.User_id=U.User_id) 
                                 JOIN tag AS T ON P.Tag_id=T.Tag_id) 
                                 LEFT JOIN Like_table AS L ON P.Post_id=L.Post_id AND L.User_id = ?
                                 LEFT JOIN (SELECT Post_id, COUNT(User_id) AS Likes 
                                             FROM Like_table GROUP BY Post_id) 
                                 AS L ON P.Post_id=L.Post_id)
                                 CROSS JOIN (SELECT COUNT(Post_id) AS n FROM POST) AS counter
                                 WHERE P.Words LIKE ?
                                 ORDER BY P.DT DESC LIMIT ?, ?");
      $words = "%".$words."%";
      $stmt->bind_param('sssii', $sessionUserId, $sessionUserId, $words, $offset, $limit);
      $stmt->execute();
      $result = $stmt->get_result();
      return $result->fetch_all(MYSQLI_ASSOC);
   }
   
      //returns posts with matching game name (tag) to $gameName, ordered by date
   public function getPostsByGameName($sessionUserId, $gameName, $offset, $limit){
      $stmt = $this->db->prepare("SELECT P.Post_id, P.Img, P.Words, P.DT, P.User_id, U.Username, U.Profile_img, T.Game_name, ? AS session_ID, IFNULL(L.Likes,0) AS Likes, (L.User_id IS NOT NULL) AS Liked,
                                 counter.n AS Number_of_posts
                                 FROM (((post AS P 
                                 JOIN user_table AS U ON P.User_id=U.User_id) 
                                 JOIN tag AS T ON P.Tag_id=T.Tag_id) 
                                 LEFT JOIN Like_table AS L ON P.Post_id=L.Post_id AND L.User_id = ?
                                 LEFT JOIN (SELECT Post_id, COUNT(User_id) AS Likes 
                                             FROM Like_table GROUP BY Post_id) 
                                 AS L ON P.Post_id=L.Post_id)
                                 CROSS JOIN (SELECT COUNT(Post_id) AS n FROM POST) AS counter
                                 WHERE T.Game_name LIKE ?
                                 ORDER BY P.DT DESC LIMIT ?, ?");
      $gameName = "%".$gameName."%";
      $stmt->bind_param('sssii', $sessionUserId, $sessionUserId, $gameName, $offset, $limit);
      $stmt->execute();
      $result = $stmt->get_result();
      return $result->fetch_all(MYSQLI_ASSOC);
   }
   
   //returns posts with matching Username to $username
   public function getPostsByUsername($sessionUserId, $username, $offset, $limit){
      $stmt = $this->db->prepare("SELECT P.Post_id, P.Img, P.Words, P.DT, P.User_id, U.Username, U.Profile_img, T.Game_name, ? AS session_ID, IFNULL(L.Likes,0) AS Likes, (L.User_id IS NOT NULL) AS Liked, 
                                 counter.n AS Number_of_posts
                                 FROM (((post AS P 
                                 JOIN user_table AS U ON P.User_id=U.User_id) 
                                 JOIN tag AS T ON P.Tag_id=T.Tag_id) 
                                 LEFT JOIN (SELECT Post_id, COUNT(User_id) AS Likes 
                                             FROM Like_table GROUP BY Post_id) 
                                    AS L ON P.Post_id=L.Post_id)
                                 CROSS JOIN (SELECT COUNT(Post_id) AS n FROM POST) AS counter
                                 WHERE U.Username LIKE ?
                                 ORDER BY P.DT DESC LIMIT ?, ?");
            $username = "%".$username."%";
            $stmt->bind_param('sssii', $sessionUserId, $sessionUserId, $username, $offset, $limit);
            $stmt->execute();
            $result = $stmt->get_result();
            return $result->fetch_all(MYSQLI_ASSOC);
         }

   //end of post retrieval functions -------------------------------------------------------------------------------

   //retrieves data about a user with username $username
   public function getUserInfo($sessionUserId, $username)
   {
      $stmt = $this->db->prepare("SELECT U.User_id, U.Username, U.E_mail, U.Passwrd, U.Profile_img, U.DT, (F.Followed_User_id IS NOT NULL) AS followed
                                 FROM user_table AS U
                                 LEFT JOIN (SELECT Followed_User_id, Follower_User_id FROM follow WHERE Follower_User_id = ?) AS F ON F.Followed_User_id = U.User_id
                                 WHERE Username = ?");
      $stmt->bind_param('is', $sessionUserId, $username);
      $stmt->execute();
      $result = $stmt->get_result();
      return $result->fetch_all(MYSQLI_ASSOC);
   }

   public function getCurrentUserInfo($userId){
      $stmt = $this->db->prepare("SELECT User_id, Username, E_mail, Passwrd, Profile_img, DT FROM user_table WHERE User_id = ?");
      $stmt->bind_param('i', $userId);
      $stmt->execute();
      $result = $stmt->get_result();
      return $result->fetch_all(MYSQLI_ASSOC);
   }

   //retrieves data about likes from the user with username $username
   public function getUserLikes($username){
      $stmt = $this->db->prepare("SELECT P.Post_id, P.Img AS Post_img, P.Words AS Post_Words, Up.Username AS Poster_Username, Up.Profile_img AS Poster_img 
                                 FROM like_table AS L 
                                 JOIN post AS P ON L.Post_id=P.Post_id 
                                 JOIN user_table AS Up ON Up.User_id=P.User_id 
                                 JOIN user_table AS Uq ON Uq.User_id=L.User_id 
                                 WHERE Uq.Username = ?");
      $stmt->bind_param('s', $username);
      $stmt->execute();
      $result = $stmt->get_result();
      return $result->fetch_all(MYSQLI_ASSOC);
   }

   //retrieves data about comments by the user with username $username
   public function getUserComments($username){
      $stmt = $this->db->prepare("SELECT C.Words, C.DT, P.Post_id, P.Img AS Post_img, P.Words AS Post_Words, Up.Username AS Poster_Username, Up.Profile_img AS Poster_img 
                                 FROM user_table AS Uc 
                                 JOIN comment AS C ON Uc.User_id=C.User_id 
                                 JOIN post AS P ON C.Post_id=P.Post_id 
                                 JOIN user_table AS Up ON Up.User_id=P.User_id 
                                 WHERE Uc.Username = ?");
      $stmt->bind_param('s', $username);
      $stmt->execute();
      $result = $stmt->get_result();
      return $result->fetch_all(MYSQLI_ASSOC);
   }

   //retrieves usernames and profile imgs of users following the user with username $username
   public function getUserFollowers($username){
      $stmt = $this->db->prepare("SELECT Uf.Username, Uf.Profile_img 
                                 FROM user_table AS Uq 
                                 JOIN follow AS F ON Uq.User_id=F.Followed_User_id 
                                 JOIN user_table AS Uf ON F.Follower_User_id=Uf.User_id 
                                 WHERE Uq.Username = ?");
      $stmt->bind_param('s', $username);
      $stmt->execute();
      $result = $stmt->get_result();
      return $result->fetch_all(MYSQLI_ASSOC);
   }

   //retrieves usernames and profile imgs of users followed by the user with username $username
   public function getUserFollowed($username){
      $stmt = $this->db->prepare("SELECT Uf.Username, Uf.Profile_img 
                                 FROM user_table AS Uq 
                                 JOIN follow AS F ON Uq.User_id=F.Follower_User_id 
                                 JOIN user_table AS Uf ON F.Followed_User_id=Uf.User_id 
                                 WHERE Uq.Username = ?");
      $stmt->bind_param('s', $username);
      $stmt->execute();
      $result = $stmt->get_result();
      return $result->fetch_all(MYSQLI_ASSOC);
   }

   //checks if user with $user_id should be blocked for too many consecutive accesses (brute force)
   public function checkbrute($user_id)
   {
      // Recupero il timestamp
      $now = time();
      // Vengono analizzati tutti i tentativi di login a partire dalle ultime due ore.
      $valid_attempts = $now - (2 * 60 * 60);
      if ($stmt = $this->db->prepare("SELECT Time_login FROM login_attempts WHERE User_id = ? AND Time_login > '$valid_attempts'")) {
         $stmt->bind_param('i', $user_id);
         // Eseguo la query creata.
         $stmt->execute();
         $stmt->store_result();
         // Verifico l'esistenza di più di 5 tentativi di login falliti.
         if ($stmt->num_rows > 5) {
            return true;
         } else {
            return false;
         }
      }
   }

   //selection queries end here ------------------------------------------------------------------------------------------------------------

   //db insertions start here ------------------------------------------------------------------------------------------------------------

   //inserts new post in the db and adds the post img to the upload directory.
   public function insertPost($user_id, $words, $tag, $img){
      //check if tag exists already in database
      $stmt = $this->db->prepare("SELECT Tag_id FROM tag WHERE Game_name = ?");
      $stmt->bind_param('s', $tag);
      $stmt->execute();
      $result = $stmt->get_result();
      $result = $result->fetch_all(MYSQLI_ASSOC);
      //if tag doesn't exist, create new tag and retrieve tag_id
      if(empty($result)){
         $stmt = $this->db->prepare("INSERT INTO tag(Game_name) VALUES(?)");
         $stmt->bind_param('s', $tag);
         $stmt->execute();
         $stmt = $this->db->prepare("SELECT Tag_id FROM tag WHERE Game_name = ?");
         $stmt->bind_param('s', $tag);
         $stmt->execute();
         $result = $stmt->get_result();
         $tagId = $result->fetch_all(MYSQLI_ASSOC)[0]["Tag_id"];
      }
      else{
         $tagId = $result[0]["Tag_id"];
      }
      $stmt = $this->db->prepare("INSERT INTO post(Img, Words, Tag_id, User_id) VALUES(?, ?, ?, ?)");
      $stmt->bind_param('ssii', $img, $words, $tagId, $user_id);
      $stmt->execute();
      return $stmt->insert_id;
   }

   public function addLike($postId, $userId){
      $stmt = $this->db->prepare("INSERT INTO like_table(Post_id, User_id) VALUES(?, ?)");
      $stmt->bind_param('ii', $postId, $userId);
      $stmt->execute();
      $stmt = $this->db->prepare("INSERT INTO notifications(Notification_type, User_id, Liked_Post_id, Like_User_id) VALUES('like', 
                        (SELECT User_id FROM post WHERE Post_id = ?), 
                        ?, ?)");
      $stmt->bind_param('iii', $postId, $postId, $userId);
      $stmt->execute();
   }

   public function addComment($postId, $userId, $words){
      $stmt = $this->db->prepare("INSERT INTO comment(Post_id, User_id, Words) VALUES(?, ?, ?)");
      $stmt->bind_param('iis', $postId, $userId, $words);
      $stmt->execute();
   }

   //db insertions end here ------------------------------------------------------------------------------------------------------------

   //db deletions start here ------------------------------------------------------------------------------------------------------------
   
   public function removeLike($postId, $userId){
      $stmt = $this->db->prepare("DELETE FROM like_table WHERE Post_id = ? AND User_id = ?");
      $stmt->bind_param('ii', $postId, $userId);
      $stmt->execute();
   }
   //db deletions end here ------------------------------------------------------------------------------------------------------------


   public function secureLoginUser($user, $password)
   {
      // Usando statement sql 'prepared' non sarà possibile attuare un attacco di tipo SQL injection.
      if ($stmt = $this->db->prepare("SELECT User_id, Username, Passwrd, Salt FROM User_table WHERE Username = ? LIMIT 1")) {
         $stmt->bind_param('s', $user); // esegue il bind del parametro '$user'.
         $stmt->execute(); // esegue la query appena creata.
         $stmt->store_result();
         $stmt->bind_result($user_id, $username, $db_password, $salt); // recupera il risultato della query e lo memorizza nelle relative variabili.
         $stmt->fetch();
         $passwordHashed = hash('sha512', $password.$salt); // codifica la password usando una chiave univoca.
         if ($stmt->num_rows == 1) { // se l'utente esiste
            // verifichiamo che non sia disabilitato in seguito all'esecuzione di troppi tentativi di accesso errati.
            if ($this->checkbrute($user_id) == true) {
               //echo "account disabilitato per troppi tentativi"; //TODO RIMUOVERE QUESTO ECHO DI DEBUG
               // Account disabilitato
               // Invia un e-mail all'utente avvisandolo che il suo account è stato disabilitato.
               return 3;
            } else {
               if ($db_password == $passwordHashed) { // Verifica che la password memorizzata nel database corrisponda alla password fornita dall'utente.
                  // Password corretta! 
                  $user_browser = $_SERVER['HTTP_USER_AGENT']; // Recupero il parametro 'user-agent' relativo all'utente corrente.
                  
                  //TODO CHECK IF THIS IS A PROBLEM. I HAVE SUBSTITUTED THE FOLLOWING LINE WITH A SIMPLER CHECK FOR CARACTERS
                  //$user_id = preg_replace("/[^0-9]+/", "", $user_id); // ci proteggiamo da un attacco XSS
                  $user_id = htmlspecialchars($user_id);
                  $_SESSION['user_id'] = $user_id;
                  //$username = preg_replace("/[^a-zA-Z0-9_\-]+/", "", $username); // ci proteggiamo da un attacco XSS
                  $username = htmlspecialchars($username);
                  $_SESSION['username'] = $username;
                  $_SESSION['login_string'] = hash('sha512', $passwordHashed.$user_browser);
                  // Login eseguito con successo.
                  return 0;
               } else {
                  //echo "password non corretta"; //TODO RIMUOVERE QUESTO ECHO DI DEBUG
				  // Password incorretta.
                  // Registriamo il tentativo fallito nel database.
                  $now = time();
                  $this->db->query("INSERT INTO login_attempts (User_id, Time_login) VALUES ('$user_id', '$now')");
                  return 1;
               }
            }
         } else {
            // L'utente inserito non esiste.
            //echo "lutente inserito non esiste"; //TODO RIMUOVERE QUESTO ECHO DI DEBUG
            return 2;
         }
      }
   }

   

   //TODO understand which is correct and used: checkLogin or login_check
   public function checkLogin($username, $password)
   {
      $query = "SELECT User_id, Username FROM User_table WHERE username = ? AND passwrd = ?";
      $stmt = $this->db->prepare($query);
      $stmt->bind_param('ss', $username, $password);
      $stmt->execute();
      $result = $stmt->get_result();
      return $result->fetch_all(MYSQLI_ASSOC);
   }

   public function login_check($user_id, $login_string, $user_browser)
   {
      // Verifica che tutte le variabili di sessione siano impostate correttamente
      if ($stmt = $this->db->prepare("SELECT Passwrd FROM User_table WHERE User_id = ? LIMIT 1")) {
         $stmt->bind_param('i', $user_id); // esegue il bind del parametro '$user_id'.
         $stmt->execute(); // Esegue la query creata.
         $stmt->store_result();

         if ($stmt->num_rows == 1) { // se l'utente esiste
            $stmt->bind_result($password); // recupera le variabili dal risultato ottenuto.
            $stmt->fetch();
            $login_check = hash('sha512', $password . $user_browser);
            if ($login_check == $login_string) {
               // Login eseguito!!!!
               return true;
            } else {
               //  Login non eseguito
               return false;
            }
         } else {
            // Login non eseguito
            return false;
         }
      } else {
         // Login non eseguito
         return false;
      }
   }

   public function registerUser($username, $email, $password)
   {
      // Crea una chiave casuale
      $random_salt = hash('sha512', uniqid(mt_rand(1, mt_getrandmax()), true));
      // Crea una password usando la chiave appena creata.
      $password = hash('sha512', $password . $random_salt);
	  $default_imgpath = "user.jpg";
      // Inserisci a questo punto il codice SQL per eseguire la INSERT nel tuo database
      // Assicurati di usare statement SQL 'prepared'.
      if ($insert_stmt = $this->db->prepare("INSERT INTO User_table (Username, E_mail, Passwrd, Salt, Profile_img) VALUES (?, ?, ?, ?, ?)")) {
         $insert_stmt->bind_param('sssss', $username, $email, $password, $random_salt, $default_imgpath);
         // Esegui la query ottenuta.
         $insert_stmt->execute();
      }
   }
}
