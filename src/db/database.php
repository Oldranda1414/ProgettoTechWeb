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

   public function getPosts($nPost)
   {
      $stmt = $this->db->prepare("SELECT Post_id, Img, Words, Day_posted, Time_posted, Tag_id, User_id FROM post LIMIT ?");
      $stmt->bind_param('i', $nPost);
      $stmt->execute();
      $result = $stmt->get_result();
      return $result->fetch_all(MYSQLI_ASSOC);
   }

   public function getUser($user_id)
   {
      $stmt = $this->db->prepare("SELECT User_id, Username, E_mail, Passwrd, Profile_img FROM user_table WHERE User_id = ?");
      $stmt->bind_param('s', $user_id);
      $stmt->execute();
      $result = $stmt->get_result();
      return $result->fetch_all(MYSQLI_ASSOC);
   }

   public function getTag($tag_id)
   {
      $stmt = $this->db->prepare("SELECT Tag_id, Game_name FROM Tag WHERE Tag_id = ?");
      $stmt->bind_param('s', $tag_id);
      $stmt->execute();
      $result = $stmt->get_result();
      return $result->fetch_all(MYSQLI_ASSOC);
   }

   public function checkLogin($username, $password)
   {
      $query = "SELECT User_id, Username FROM User_table WHERE username = ? AND passwrd = ?";
      $stmt = $this->db->prepare($query);
      $stmt->bind_param('ss', $username, $password);
      $stmt->execute();
      $result = $stmt->get_result();
      return $result->fetch_all(MYSQLI_ASSOC);
   }

   public function getLikes($postId)
   {
      $query = "SELECT COUNT(Post_id) AS NumberOfLikes FROM Like_table WHERE Post_id = ?";
      $stmt = $this->db->prepare($query);
      $stmt->bind_param('i', $postId);
      $stmt->execute();
      $result = $stmt->get_result();
      return $result->fetch_all(MYSQLI_ASSOC)[0]["NumberOfLikes"];
   }

   public function getComment($postId)
   {
      $query = "SELECT U.Username, U.Profile_img, C.Words, C.Day_posted, C.Time_posted FROM User_table AS U JOIN Comment AS C ON U.User_id = C.User_id WHERE C.Post_id = ?";
      $stmt = $this->db->prepare($query);
      $stmt->bind_param('i', $postId);
      $stmt->execute();
      $result = $stmt->get_result();
      return $result->fetch_all(MYSQLI_ASSOC);
   }

   public function getFullPosts($nPost)
   {
      $result = $this->getPosts($nPost);
      foreach ($result as &$post) {
         $user = $this->getUser($post["User_id"]);
         $post["Username"] = $user[0]["Username"];
         $post["UserProfilePic"] = $user[0]["Profile_img"];
         $post["Tag"] = $this->getTag($post["Tag_id"])[0]["Game_name"];
         $post["NumberOfLikes"] = $this->getLikes($post["Post_id"]);
         $post["Comments"] = $this->getComment($post["Post_id"]);
      }
      return $result;
   }

   public function getMostLikePosts($day, $nPost)
   {
      $stmt = $this->db->prepare("SELECT COUNT(L.User_id) AS Likes, P.Post_id, Img, Words, Day_posted, Time_posted, Tag_id, P.User_id FROM like_table AS L JOIN post AS P ON L.Post_id=P.Post_id WHERE Day_posted = ? GROUP BY Post_id ORDER BY Likes DESC LIMIT ?");
      $stmt->bind_param('si', $day, $nPost);
      $stmt->execute();
      $result = $stmt->get_result();
      return $result->fetch_all(MYSQLI_ASSOC);
   }

   public function getFullMostLikedPosts($day, $nPost)
   {
      $result = $this->getMostLikePosts($day, $nPost);
      foreach ($result as &$post) {
         $user = $this->getUser($post["User_id"]);
         $post["Username"] = $user[0]["Username"];
         $post["UserProfilePic"] = $user[0]["Profile_img"];
         $post["Tag"] = $this->getTag($post["Tag_id"])[0]["Game_name"];
         $post["NumberOfLikes"] = $this->getLikes($post["Post_id"]);
         $post["Comments"] = $this->getComment($post["Post_id"]);
      }
      return $result;
   }

   public function secureLoginUser($user, $password)
   {
      // Usando statement sql 'prepared' non sarà possibile attuare un attacco di tipo SQL injection.
      if ($stmt = $this->db->prepare("SELECT User_id, Username, Passwrd, Salt FROM User_table WHERE Username = ? LIMIT 1")) {
         $stmt->bind_param('s', $user); // esegue il bind del parametro '$user'.
         $stmt->execute(); // esegue la query appena creata.
         $stmt->store_result();
         $stmt->bind_result($user_id, $username, $db_password, $salt); // recupera il risultato della query e lo memorizza nelle relative variabili.
         $stmt->fetch();
         echo "this is password.salt",$password.$salt;
         $passwordHashed = hash('sha512', $password.$salt); // codifica la password usando una chiave univoca.
         echo "eseguo hashing di password e salt: ", $passwordHashed;
         if ($stmt->num_rows == 1) { // se l'utente esiste
            // verifichiamo che non sia disabilitato in seguito all'esecuzione di troppi tentativi di accesso errati.
            if ($this->checkbrute($user_id) == true) {
               echo "account disabilitato per troppi tentativi"; //TODO RIMUOVERE QUESTO ECHO DI DEBUG
               // Account disabilitato
               // Invia un e-mail all'utente avvisandolo che il suo account è stato disabilitato.
               return false;
            } else {
               if ($db_password == $passwordHashed) { // Verifica che la password memorizzata nel database corrisponda alla password fornita dall'utente.
                  // Password corretta!
                  echo "password dal db: ",$db_password;
                  echo "password immessa: ",$passwordHashed;   
                  $user_browser = $_SERVER['HTTP_USER_AGENT']; // Recupero il parametro 'user-agent' relativo all'utente corrente.

                  $user_id = preg_replace("/[^0-9]+/", "", $user_id); // ci proteggiamo da un attacco XSS
                  $_SESSION['user_id'] = $user_id;
                  $username = preg_replace("/[^a-zA-Z0-9_\-]+/", "", $username); // ci proteggiamo da un attacco XSS
                  $_SESSION['username'] = $username;
                  $_SESSION['login_string'] = hash('sha512', $passwordHashed.$user_browser);
                  // Login eseguito con successo.
                  return true;
               } else {
                  echo "password non corretta"; //TODO RIMUOVERE QUESTO ECHO DI DEBUG
                  // Password incorretta.
                  // Registriamo il tentativo fallito nel database.
                  $now = time();
                  $this->db->query("INSERT INTO login_attempts (User_id, Time_login) VALUES ('$user_id', '$now')");
                  return false;
               }
            }
         } else {
            // L'utente inserito non esiste.
            echo "lutente inserito non esiste"; //TODO RIMUOVERE QUESTO ECHO DI DEBUG
            return false;
         }
      }
   }
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
      // Inserisci a questo punto il codice SQL per eseguire la INSERT nel tuo database
      // Assicurati di usare statement SQL 'prepared'.
      if ($insert_stmt = $this->db->prepare("INSERT INTO User_table (Username, E_mail, Passwrd, Salt) VALUES (?, ?, ?, ?)")) {
         $insert_stmt->bind_param('ssss', $username, $email, $password, $random_salt);
         // Esegui la query ottenuta.
         $insert_stmt->execute();
      }
   }
}
