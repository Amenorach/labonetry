<?php
require_once "Login/registerprocess.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign Up</title>
    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/headers/">
    <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
            .bd-placeholder-img {
                font-size: 1.125rem;
                text-anchor: middle;
                -webkit-user-select: none;
                -moz-user-select: none;
                user-select: none;
            }
            
            @media (min-width: 768px) {
                .bd-placeholder-img-lg {
                    font-size: 3.5rem;
                }
            }
        </style> -->


        <!-- Custom styles for this template -->
        <link href="CSS/signin.css" rel="stylesheet">
</head>
<body class="text-center" style="background-image: url('Images/blur.jpg');">

    <main class="form-signin">
            <img class="mb-4" src="Images/phoneLogo.png" alt="Phone Handle" width="72" height="57">
            <div class="text-white">
                <h2>Sign Up</h2>
                <p>Please fill this form to create an account.</p>
            </div>

            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <div class="form-floating">
                    <input type="text" name="customer_name" class="form-control <?php echo (!empty($customer_name_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $customer_name; ?>">
                    <span class="invalid-feedback"><?php echo $customer_name_err; ?></span>
                    <label>Your Name</label>
                </div>    
                <div class="form-floating">
                    <input type="text" name="customer_contact" class="form-control <?php echo (!empty($telephone_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $telephone; ?>">
                    <span class="invalid-feedback"><?php echo $telephone_err; ?></span>
                    <label>Phone Number</label>
                </div>
                <div class="form-floating">
                    <input type="text" name="customer_country" class="form-control <?php echo (!empty($address_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $address; ?>">
                    <span class="invalid-feedback"><?php echo $address_err; ?></span>
                    <label>Country</label>
                </div>
                <div class="form-floating">
                    <input type="text" name="customer_email" class="form-control <?php echo (!empty($email_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $email; ?>">
                    <span class="invalid-feedback"><?php echo $email_err; ?></span>
                    <label>Email address</label>
                </div>
                <div class="form-floating">
                    <input type="password" name="customer_pass" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $password; ?>">
                    <span class="invalid-feedback"><?php echo $password_err; ?></span>
                    <label>Password</label>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Submit">
                    <input type="reset" class="btn btn-secondary ml-2" value="Reset">
                </div>
                <div class="text-white">
                    <p>Already have an account? <a href="./Login/login.php">Login here</a>.</p>
                </div>
            </form> 
    </main>  
</body>
</html>


