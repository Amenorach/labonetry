<?php
 require "./Settings/db_connection.php";
 require_once "./Error/loginerror.php";

$email =$_POST["customer_email"];
$password =$_POST["customer_pass"];
 $sql_query = "SELECT customer_email FROM customer WHERE `customer_email` = '$email' AND `customer_pass` = '$password' ";

 $result = mysqli_query($link,$sql_query);
 if(mysqli_num_rows($result) > 0 ){
	header("location: home.php");
 }
 else{
 	header("location: loginerror.php");
 }
 ?>