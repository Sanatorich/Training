<?php
header('Access-Control-Allow-Origin: *');
header("Content-Type: application/json; charset=UTF-8");

require("../includes/config.php");
require("../includes/functions.php");

if(isset($_GET['id'])){
    $postData = deletePostAPI($connection, $_GET['id']);
}else{
    echo "Error in (id)";
    exit;
}

$output = $postData;

echo json_encode($output);

dbDisconnect($connection);
?>
