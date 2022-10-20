<?php
 require "../Settings/db_connection.php";

$email =$_POST["customer_email"];
$password =$_POST["customer_pass"];
$sql_query = "SELECT customer_email FROM customer WHERE `customer_email` = '$email' AND `customer_pass` = '$password' ";

 $result = mysqli_query($link,$sql_query);
 if(mysqli_num_rows($result) > 0 ){
	header("location: ../View/home.php");
 }
 else{
 	header("location: ../Error/loginerror.php");
 }
 ?>