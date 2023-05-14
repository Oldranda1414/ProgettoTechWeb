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

   //returns an assoc array containing comments referring to post with $postId as Post_id
   public function getComment($postId)
   {
      $query = "SELECT U.Username, U.Profile_img, C.Words, C.DT FROM User_table AS U JOIN Comment AS C ON U.User_id = C.User_id WHERE C.Post_id = ? ORDER BY C.DT";
      $stmt = $this->db->prepare($query);
      $stmt->bind_param('i', $postId);
      $stmt->execute();
      $result = $stmt->get_result();
      return $result->fetch_all(MYSQLI_ASSOC);
   }

   //receives an associative array of posts and compleates the array adding all the comments relative to each post
   public function getPostsAndComments($result)
   {
      foreach ($result as &$post) {
         $post["Comments"] = $this->getComment($post["Post_id"]);
      }
      return $result;
   }

   //retrieves post data for the latest $n posts
   //note that the only data missing is about comments related to each post
   public function getLatestNPosts($n){
      $stmt = $this->db->prepare("SELECT P.Post_id, P.Img, P.Words, P.DT, P.User_id, U.Username, U.Profile_img, T.Game_name, IFNULL(L.Likes,0) AS Likes 
                                 FROM (((post AS P 
                                 JOIN user_table AS U ON P.User_id=U.User_id) 
                                 JOIN tag AS T ON P.Tag_id=T.Tag_id) 
                                 LEFT JOIN (SELECT Post_id, COUNT(User_id) AS Likes 
                                             FROM Like_table GROUP BY Post_id) 
                                 AS L ON P.Post_id=L.Post_id) 
                                 ORDER BY P.DT DESC LIMIT ?");
      $stmt->bind_param('i', $n);
      $stmt->execute();
      $result = $stmt->get_result();
      return $result->fetch_all(MYSQLI_ASSOC);
   }

   //retrieves post data and the comments related to them for the latest $n posts
   public function getLatestPostsAndComments($n){
      $result = $this->getLatestNPosts($n);
      return $this->getPostsAndComments($result);
   }

   //retrieves post data for the $n most liked posts of the day $day
   //note that the only data missing is about comments related to each post
   public function getMostLikedPosts($day, $n)
   {
      $stmt = $this->db->prepare("SELECT P.Post_id, P.Img, P.Words, P.DT, P.User_id, U.Username, U.Profile_img, T.Game_name, IFNULL(L.Likes,0) AS Likes 
                                 FROM (((post AS P 
                                 JOIN user_table AS U ON P.User_id=U.User_id) 
                                 JOIN tag AS T ON P.Tag_id=T.Tag_id) 
                                 LEFT JOIN (SELECT Post_id, COUNT(User_id) AS Likes 
                                             FROM Like_table GROUP BY Post_id) 
                                 AS L ON P.Post_id=L.Post_id) 
                                 WHERE P.DT<DATE_ADD(?, INTERVAL 1 DAY) AND P.DT>?
                                 ORDER BY L.Likes DESC LIMIT ?");
      $stmt->bind_param('ssi', $day, $day, $n);
      $stmt->execute();
      $result = $stmt->get_result();
      return $result->fetch_all(MYSQLI_ASSOC);
   }

   //retrieves post data and the comments related to them for the $n most liked posts of the day $day
   public function getMostLikedPostsAndComments($day, $n)
   {
      $result = $this->getMostLikedPosts($day, $n);
      return $this->getPostsAndComments($result);
   }

   //retrieves post data for the latest $n posts posted by user with Username $username
   //note that the only data missing is about comments related to each post
   public function getPostsByUser($username, $n)
   {
      $stmt = $this->db->prepare("SELECT P.Post_id, P.Img, P.Words, P.DT, P.User_id, U.Username, U.Profile_img, T.Game_name, IFNULL(L.Likes,0) AS Likes 
                                 FROM (((post AS P 
                                 JOIN user_table AS U ON P.User_id=U.User_id) 
                                 JOIN tag AS T ON P.Tag_id=T.Tag_id) 
                                 LEFT JOIN (SELECT Post_id, COUNT(User_id) AS Likes 
                                             FROM Like_table GROUP BY Post_id) 
                                 AS L ON P.Post_id=L.Post_id)
                                 WHERE U.Username= ?
                                 ORDER BY P.DT DESC LIMIT ?");
      $stmt->bind_param('si', $username, $n);
      $stmt->execute();
      $result = $stmt->get_result();
      return $result->fetch_all(MYSQLI_ASSOC);
   }

   //retrieves post data and the comments related to them for the latest $n posts posted by user with Username $username
   public function getPostsAndCommentsByUser($username, $n)
   {
      $result = $this->getPostsByUser($username, $n);
      return $this->getPostsAndComments($result);
   }

   //retrieves data about a user
   public function getUser($username)
   {
      $stmt = $this->db->prepare("SELECT User_id, Username, E_mail, Passwrd, Profile_img FROM user_table WHERE Username = ?");
      $stmt->bind_param('s', $username);
      $stmt->execute();
      $result = $stmt->get_result();
      return $result->fetch_all(MYSQLI_ASSOC);
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
         $passwordHashed = hash('sha512', $password.$salt); // codifica la password usando una chiave univoca.
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
      // Inserisci a questo punto il codice SQL per eseguire la INSERT nel tuo database
      // Assicurati di usare statement SQL 'prepared'.
      if ($insert_stmt = $this->db->prepare("INSERT INTO User_table (Username, E_mail, Passwrd, Salt) VALUES (?, ?, ?, ?)")) {
         $insert_stmt->bind_param('ssss', $username, $email, $password, $random_salt);
         // Esegui la query ottenuta.
         $insert_stmt->execute();
      }
   }
}
