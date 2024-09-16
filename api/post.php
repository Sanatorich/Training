<?php
header('Access-Control-Allow-Origin: *');
header("Content-Type: application/json; charset=UTF-8");

require("../includes/config.php");
require("../includes/functions.php");

if(isset($_GET['id']) && $_GET['id'] > 0 ){
    $postData = getPostInfoAPI($connection,$_GET['id']);
}else{
    echo "Error in (id)";
}

$output = $postData;

echo json_encode($output);

dbDisconnect($connection);
?>
