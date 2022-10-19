<?php
require "./Settings/dbConnectCredentials.php";

$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

//CHECKING CONNECTION
if ($link == false) {
    die("Error: Could not connect to database. " . mysqli_connect_error());
}
?>