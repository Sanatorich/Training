<?php
header('Access-Control-Allow-Origin: *');
header("Content-Type: application/json; charset=UTF-8");

require("../includes/config.php");
require("../includes/functions.php");

$allPosts = getallPostsAPI($connection);

$output = $allPosts;

echo json_encode($output);

dbDisconnect($connection);
?>
