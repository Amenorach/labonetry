<?php
// Include database connection file
require_once "./Settings/db_connection.php";
// include "index.php";
include_once "./View/home.php";
 
// Define variables and initialize with empty values
$customer_name = $telephone = $address = $email = $password = "";
$customer_name_err = $telephone_err = $address_err = $email_err = $password_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Validate name
    $input_name = trim($_POST["customer_name"]);
    if(empty($input_name)){
        $customer_name_err = "Please enter your full name.";
    } elseif(!filter_var($input_name, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $customer_name_err = "Please enter a valid name.";
    } else{
        $customer_name = $input_name;
    }
    
    // Validate telephone number
    $input_telephone = trim($_POST["customer_contact"]);
    if(empty($input_telephone)){
        $telephone_err = "Please enter your telephone number.";     
    } else{
        $telephone = $input_telephone;
    }

    // Validate address
    $input_address = trim($_POST["customer_country"]);
    if(empty($input_address)){
        $address_err = "Please enter your country.";     
    } else{
        $address = $input_address;
    }

    // Validate email
    $input_email = trim($_POST["customer_email"]);
    if(empty($input_email)){
        $email_err = "Please enter your email.";     
    } else{
        $email = $input_email;
    }

    // Validate password
    if(empty(trim($_POST["customer_pass"]))){
        $password_err = "Please enter a password.";     
    } elseif(strlen(trim($_POST["customer_pass"])) < 6){ //string length less than 6, prompt the user.
        $password_err = "Password must have atleast 6 characters.";
    } else{
        $password = trim($_POST["customer_pass"]);
    }
    
    
    // Check input errors before inserting in database
    if(empty($customer_name_err) && empty($telephone_err) && empty($address_err) && empty($email_err) && empty($password_err)){
        // Prepare an insert statement
        $sql = "INSERT INTO customer (customer_name, customer_contact, customer_country, customer_email, customer_pass) VALUES (?, ?, ?, ?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sssss", $param_name, $param_telephone, $param_address, $param_email, $param_password);
            
            // Set parameters
            $param_name = $customer_name;
            $param_telephone = $telephone;
            $param_address = $address;
            $param_email = $email;
            $param_password = $password;

            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records created successfully. Redirect to landing page
                header("location: home.php");
                exit();
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Close connection
    mysqli_close($link);
}
?>
