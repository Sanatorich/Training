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
if(isset($_GET['id'])){
    $id = $_GET['id'];
}else{
    echo "Error in (id)";
    exit;
}

$postData = updatePostAPI($connection);

$output = $postData;

echo json_encode($output);

dbDisconnect($connection);
?>
