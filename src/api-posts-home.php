<?php
    require_once 'bootstrap.php';
   
    $numberPosts=$_GET["numberPosts"];
    $offset=$_GET["offset"];
    $username=$_SESSION['username'];
    $page=$_SERVER['HTTP_REFERER'];
    
    if (isset($page)){
        if (strpos($page, "myprofile")!== false){
            $posts = $dbh->getPostsByUser2($username, $offset, $numberPosts);
        } else if (strpos($page, "profile")!== false){
            $newuser = explode(".php?Username=", $page);
            $posts = $dbh->getPostsByUser2($newuser[1], $offset, $numberPosts);
        } else if (strpos($page, "home")!== false) {
            $posts = $dbh->getLatestNPosts($offset,$numberPosts);
        } else if (strpos($page, "explore")!== false){
            $search = strpos($page, "?search=")[1];
            $search = strpos($page "&flexRadioDefault=")[0];
            $type = strpos($page "&flexRadioDefault=")[1];
            $type = strpos($page "#")[0];
            if (strpos($type, "user")!== false){
                $posts = $dbh->getPostsByUsername($search,$offset,$numberPosts);
            } else if (strpos($page, "tag")!== false){
                $posts = $dbh->getLatestNPosts($search,$offset,$numberPosts);
            } else if (strpos($page, "post")!== false){
                $posts = $dbh-> $dbh->getPostsByUsername($search,$offset,$numberPosts);
            } else {
                $posts = $dbh->getLatestNPosts($offset,$numberPosts);
            }
        }
    } else {
        $posts = $dbh->getLatestNPosts($offset,$numberPosts);
    }

    for($i = 0; $i < count($posts); $i++){
        $posts[$i]["Profile_img"] = UPLOAD_DIR."profiles/".$posts[$i]["Profile_img"];
        $posts[$i]["Img"] = UPLOAD_DIR."posts/".$posts[$i]["Img"];
    }
    header('Content-Type: application/json');
    echo json_encode($posts);
?>
