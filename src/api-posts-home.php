<?php
    require_once 'bootstrap.php';
    $numberPosts=$_GET["numberPosts"];
    $offset=$_GET["offset"];
    
    $posts = $dbh->getLatestNPosts($offset,$numberPosts);

    for($i = 0; $i < count($posts); $i++){
        $posts[$i]["Profile_img"] = UPLOAD_DIR."profiles/".$posts[$i]["Profile_img"];
        $posts[$i]["Img"] = UPLOAD_DIR."posts/".$posts[$i]["Img"];
    }
    header('Content-Type: application/json');
    echo json_encode($posts);
?>
