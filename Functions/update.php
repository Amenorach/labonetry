<?php
require_once "db_connection.php";

$pname = $pphoned = $pid = "";
$pname_err = $pphoned_err = $pid_err = "";

if(isset($_POST["pid"]) && !empty($_POST["pid"])){
	$pid = $_POST["pid"];

	//Name Validation
	$input_pname = trim($_POST["pname"]);
	if (empty($input_pname)) {
		$pname_err = "Please enter the name";
	}elseif (!filter_var($input_pname, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
		$pname_err = "Please enter a valid name";
	}else {
		$pname = $input_pname;
	}

	$input_pphoned = trim($_POST["pphoned"]);
	if (empty($input_pphoned)) {
		$pphoned_err = "Please enter the name of the person who phoned";
	}else {
		$pphoned = $input_pphoned;
	}

	//Checking input errors before updating in database
	if (empty($pname_err) && empty($pphoned_err)){
			//Update Statement
		$sql = "UPDATE phonebook SET pname=?, pphoned=? WHERE pid=?";
			//Set Parameters

			if ($stmt = mysqli_prepare($link, $sql)) {
				//Bind variables to the prepared statement as parameters
				mysqli_stmt_bind_param($stmt, "ssi", $param_pname, $param_pphoned, $param_pid);
			
				$param_pname = $pname;
				$param_pphoned = $pphoned;
				$param_pid = $pid;

	     			// Attempt to execute the prepared statement
				if (mysqli_stmt_execute($stmt)){
					//Records updated. Now, redirect to landing page.
					header("location: index.php");
					exit();
				}else {
					echo "Oops! Something went wrong. Try again later!";
				}
			}
			//Close Statement
		mysqli_stmt_close($stmt);
	}
			//Close Connnection
		mysqli_close($link);

}else {
	//Check existence of id param before processing further
	if (isset($_GET["pid"]) && !empty(trim($_GET["pid"]))) {
		// Get URL param
		$pid = trim($_GET["pid"]);

		//Prepare a Select Statement
		$sql = "SELECT * FROM phonebook WHERE pid = ?";
		if ($stmt = mysqli_prepare($link, $sql)) {
			//Bind variables to the prepared statement as params
			mysqli_stmt_bind_param($stmt, "i", $param_pid);

			//Set Params
			$param_pid = $pid;

			 // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                $result = mysqli_stmt_get_result($stmt);
    
                if(mysqli_num_rows($result) == 1){
                    // Fetch result row as an associative array.
                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                    
                    // Retrieve individual field value
					$pname = $row["pname"];
					$pphoned = $row["pphoned"];
					$pid = $row["pid"];
				}else {
					//URL does not contain valid ID.
					header("location: error.php");
					exit();
				}

			} else {
				echo "Oops! Something went wrong.";
			}
		}
       	// Close statement
    	mysqli_stmt_close($stmt);
        
        // Close connection
        mysqli_close($link);
    } else{
        // URL doesn't contain id parameter. Redirect to error page
        header("location: error.php");
        exit();
    }
}
?>
