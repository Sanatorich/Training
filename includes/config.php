<?php
$connection = dbConnect();

function dbConnect()
{
    $connection = mysqli_connect("localhost", "root", "", "cinema")
        or die("Could not connect");
   /* $connection = mysqli_connect("localhost", "celler", "1442150", "kwork_inema")
    or die("Could not connect");*/
    mysqli_select_db($connection, "cinema") or die("Could not select database");
    return $connection;
}

function dbDisconnect($connection)
{
    mysqli_close($connection);
}
