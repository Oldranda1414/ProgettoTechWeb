<?php
    require_once 'bootstrap.php';
   
    $numberPosts=$_GET["numberPosts"];
    $offset=$_GET["offset"];
    $username=$_SESSION['username'];
    $page=$_SERVER['HTTP_REFERER'];
    $id=$_SESSION['user_id'];
    
    if (isset($page)){
        if (strpos($page, "myprofile")!== false){
            $posts = $dbh->getPostsByUser($id, $username, $offset, $numberPosts);
        } else if (strpos($page, "profile")!== false){
            $newuser = explode(".php?Username=", $page);
            $posts = $dbh->getPostsByUser($id, $newuser[1], $offset, $numberPosts);
        } else if (strpos($page, "home")!== false || strpos($page, "index")!== false) {
            $posts = $dbh->getLatestNPosts($id,$offset,$numberPosts);
        } else if (strpos($page, "explore")!== false){
            if (isset($_POST["search"])){
                $search = $_POST["search"]; 
                $type = $_POST["flexRadioDefault"];
                if (strpos($type, "user")!== false){
                    $posts = $dbh->getPostsByUsername($id,$search,$offset,$numberPosts);
                } else if (strpos($type, "tag")!== false){
                    $posts = $dbh->getPostsByGameName($id,$search,$offset,$numberPosts);
                } else if (strpos($type, "post")!== false){
                    $posts = $dbh-> $dbh->getPostsByWords($id,$search,$offset,$numberPosts);
                }
            } else {
                $posts = $dbh->getLatestNPosts($id,$offset,$numberPosts);
            }
        }
    } else {
    }

    for($i = 0; $i < count($posts); $i++){
        $posts[$i]["Profile_img"] = UPLOAD_DIR."profiles/".$posts[$i]["Profile_img"];
        $posts[$i]["Img"] = UPLOAD_DIR."posts/".$posts[$i]["Img"];
    }
    header('Content-Type: application/json');
    echo json_encode($posts);
?>
