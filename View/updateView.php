<?php
require "../Settings/db_connection.php";
require "../Functions/update.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Record</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .wrapper{
            width: 600px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="mt-5">Update Phone Record</h2>
                    <p>Please edit the information and submit to update the phonebook record.</p>
                    <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">
                        <div class="form-group">
                            <label>Phoner's Name:</label>
                            <input type="text" name="pname" class="form-control <?php echo (!empty($pname_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $pname; ?>">
                            <span class="invalid-feedback"><?php echo $pname_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Person Phoned:</label>
                            <input type="text" name="pphoned" class="form-control <?php echo (!empty($pphoned_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $pphoned; ?>">
                            <span class="invalid-feedback"><?php echo $pphoned_err;?></span>
                        </div>
                        <input type="hidden" name="pid" value="<?php echo $pid; ?>"/>
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="../index.php" class="btn btn-secondary ml-2">Cancel</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>