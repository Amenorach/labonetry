<?php
require_once "db_connection.php";

$pname = $pphoned = "";
$pname_err = $pphoned_err = "";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Validate name
    $input_pname = trim($_POST["pname"]);
    if(empty($input_pname)){
        $pname_err = "Please enter the Phoner.";
    } elseif(!filter_var($input_pname, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $pname_err = "Please enter a valid name.";
    } else{
        $pname = $input_pname;
    }
    
    // Validate person phoned
    $input_pphoned = trim($_POST["pphoned"]);
    if(empty($input_pphoned)){
        $pphoned_err = "Please enter the name of the person phoned.";     
    } else{
        $pphoned = $input_pphoned;
    }


    // Check input errors before inserting in database
    if(empty($pname_err) && empty($pphoned_err)){
        // Prepare an insert statement
        $sql = "INSERT INTO phonebook (pname, pphoned) VALUES (?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ss", $param_pname, $param_pphoned);
            
            // Set parameters
            $param_pname = $pname;
            $param_pphoned = $pphoned;


            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records created successfully.
                header("location: index.php");
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