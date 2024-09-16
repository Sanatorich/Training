<?php
header('Access-Control-Allow-Origin: *');
header("Content-Type: application/json; charset=UTF-8");

require("../includes/config.php");
require("../includes/functions.php");

if(isset($_POST['postTitle'])){
    $title = $_POST['postTitle'];
}else{
    echo "Error in (postTitle)";
    exit;
}
if(isset($_POST['postComment'])){
    $comment = $_POST['postComment'];
}else{
    echo "Error in (postComment)";
    exit;
}
if(isset($_POST['postImg'])){
    $image = $_POST['postImg'];
}else{
    echo "Error in (postImg)";
    exit;
}
if(isset($_POST['userName'])){
    $username = $_POST['userName'];
}else{
    echo "Error in (userName)";
    exit;
}

$savePost = savePostAPI($connection);

if(isset($savePost) && $savePost > 0 ) {
    $postData = getPostInfoAPI($connection, $savePost);

    $output = $postData;

    echo json_encode($output);
}

dbDisconnect($connection);
?>
