<?php
    require_once 'bootstrap.php';
    
    if (isset($_SESSION['username'])){
    
        $numberPosts=$_GET["numberPosts"];
        $offset=$_GET["offset"];
        $username=$_SESSION['username'];
        $page=$_SERVER['HTTP_REFERER'];
        $id=$_SESSION['user_id'];
    
        if (isset($page)){
            if (strpos($page, "rofile")!== false){
                if (isset($_GET["user"])){
                    $username=$_GET["user"];
                }
                $posts = $dbh->getPostsByUser($id, $username, $offset, $numberPosts);
            } else if (strpos($page, "home")!== false || strpos($page, "index")!== false) {
                $posts = $dbh->getPostByFollowed($id,$offset,$numberPosts);
            } else if (strpos($page, "explore")!== false){
                if (isset($_GET["search"])){
                    $search = $_GET["search"]; 
                    $type = $_GET["type"];
                    if ($type=='user'){
                        $posts = $dbh->getPostsByUsername($id,$search,$offset,$numberPosts);
                    } else if ($type=='ptag'){
                        if (strpos($search, "_")!==false){
                            $search = str_replace("_", " ", $search);
                        }
                        $posts = $dbh->getPostsByPreciseGameName($id, $search, $offset, $numberPosts);
                    } else if ($type=='tag'){
                        $posts = $dbh->getPostsByGameName($id,$search,$offset,$numberPosts);
                    } else if ($type=='post'){
                        $posts = $dbh->getPostsByWords($id,$search,$offset,$numberPosts);
                    }
                } else {
                    $posts = $dbh->getLatestNPosts($id,$offset,$numberPosts);
                }
            } else {
                $posts = $dbh->getPostByFollowed($id,$offset,$numberPosts);
            }
        }

        for($i = 0; $i < count($posts); $i++){
            $posts[$i]["Profile_img"] = UPLOAD_DIR."profiles/".$posts[$i]["Profile_img"];
            $posts[$i]["Img"] = UPLOAD_DIR."posts/".$posts[$i]["Img"];
        }
        header('Content-Type: application/json');
        echo json_encode($posts);
    }
